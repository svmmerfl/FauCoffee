<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalCategories' => Category::count(),
            'totalProducts' => Product::count(),
            'averagePrice' => (int) Product::avg('price'),
            'categories' => Category::withCount('products')->get(),
            'latestProducts' => Product::with('category')->latest()->take(5)->get(),
        ]);
    }
}
