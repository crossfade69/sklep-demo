<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Subcategory;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Subkategorie
        $wiertarki = Subcategory::where('slug', 'wiertarki')->first();
        $cement = Subcategory::where('slug', 'cement')->first();
        $farby = Subcategory::where('slug', 'farby')->first();

        // Tworzenie produktów
        Product::create([
            'name' => 'Wiertarka elektryczna',
            'description' => 'Wiertarka o dużej mocy do wiercenia w różnych materiałach.',
            'price' => 250.00,
            'image' => 'wiertarka.jpg',
            'subcategory_id' => $wiertarki->id,
        ]);

        Product::create([
            'name' => 'Wiertarka akumulatorowa',
            'description' => 'Wiertarka bezprzewodowa, idealna do prac w terenie.',
            'price' => 450.00,
            'image' => 'wiertarka_akumulatorowa.jpg',
            'subcategory_id' => $wiertarki->id,
        ]);

        Product::create([
            'name' => 'Cement budowlany',
            'description' => 'Wysokiej jakości cement do wszelkich prac budowlanych.',
            'price' => 20.00,
            'image' => 'cement.jpg',
            'subcategory_id' => $cement->id,
        ]);

        Product::create([
            'name' => 'Cegły klinkierowe',
            'description' => 'Cegły o wysokiej odporności na warunki atmosferyczne.',
            'price' => 5.00,
            'image' => 'cegly.jpg',
            'subcategory_id' => $cement->id,
        ]);

        Product::create([
            'name' => 'Farba lateksowa',
            'description' => 'Farba lateksowa odporna na wilgoć, idealna do łazienek.',
            'price' => 120.00,
            'image' => 'farba.jpg',
            'subcategory_id' => $farby->id,
        ]);
    }
}
