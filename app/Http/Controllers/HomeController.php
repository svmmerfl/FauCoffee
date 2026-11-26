<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->get();
        $products = Product::with('category')->latest()->take(6)->get();

        return view('public.home', compact('categories', 'products'));
    }

    public function products(Request $request)
    {
        $categories = Category::all();
        $query = Product::with('category');

        if ($request->filled('kategori')) {
            $query->where('category_id', $request->kategori);
        }

        if ($request->filled('q')) {
            $query->where('name', 'like', '%' . $request->q . '%');
        }

        switch ($request->urut) {
            case 'termurah':
                $query->orderBy('price');
                break;
            case 'termahal':
                $query->orderByDesc('price');
                break;
            case 'nama':
                $query->orderBy('name');
                break;
            default:
                $query->latest();
        }

        $products = $query->paginate(9)->withQueryString();

        return view('public.products', compact('categories', 'products'));
    }

    public function show(Product $product)
    {
        $product->load('category');
        $related = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)->take(3)->get();

        return view('public.show', compact('product', 'related'));
    }
}
