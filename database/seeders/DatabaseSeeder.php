<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $kopi = Category::create(['name' => 'Kopi', 'description' => 'Kopi pilihan dari biji terbaik nusantara.']);
        $nonKopi = Category::create(['name' => 'Non-Kopi', 'description' => 'Minuman segar dan hangat tanpa kopi.']);
        $snack = Category::create(['name' => 'Camilan', 'description' => 'Teman santai untuk menikmati kopi.']);

        $data = [
            [$kopi, 'Espresso', 18000, 'Ekstrak kopi pekat dengan crema tebal dan aroma kuat.'],
            [$kopi, 'Caramel Latte', 28000, 'Espresso, susu lembut, dan saus karamel manis.'],
            [$kopi, 'Kopi Susu FauCoffee', 22000, 'Kopi susu khas FauCoffee dengan gula aren.'],
            [$nonKopi, 'Matcha Latte', 27000, 'Matcha premium berpadu susu segar yang creamy.'],
            [$nonKopi, 'Chocolate Hazelnut', 26000, 'Cokelat pekat dengan sentuhan hazelnut.'],
            [$snack, 'Butter Croissant', 20000, 'Croissant renyah dengan butter harum.'],
        ];

        foreach ($data as [$category, $name, $price, $desc]) {
            Product::create([
                'category_id' => $category->id,
                'name' => $name,
                'price' => $price,
                'description' => $desc,
            ]);
        }
    }
}
