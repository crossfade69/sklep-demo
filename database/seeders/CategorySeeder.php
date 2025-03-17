<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Główne kategorie
        $kategorie = [
            ['name' => 'Narzędzia', 'slug' => 'narzedzia', 'parent_id' => null],
            ['name' => 'Materiały budowlane', 'slug' => 'materialy-budowlane', 'parent_id' => null],
            ['name' => 'Wykończenia', 'slug' => 'wykonczenia', 'parent_id' => null],
        ];

        // Tworzenie kategorii
        foreach ($kategorie as $kategoria) {
            Category::create($kategoria);
        }

        // Kategoria główna "Narzędzia" i jej subkategorie
        $narzedzia = Category::where('slug', 'narzedzia')->first();
        $narzedzia->subcategories()->createMany([
            ['name' => 'Wiertarki', 'slug' => 'wiertarki'],
            ['name' => 'Młoty', 'slug' => 'mloty'],
            ['name' => 'Piły', 'slug' => 'pily'],
        ]);

        // Kategoria główna "Materiały budowlane" i jej subkategorie
        $materialy = Category::where('slug', 'materialy-budowlane')->first();
        $materialy->subcategories()->createMany([
            ['name' => 'Cement', 'slug' => 'cement'],
            ['name' => 'Cegły', 'slug' => 'cegly'],
            ['name' => 'Płyty kartonowo-gipsowe', 'slug' => 'plyty-kartonowo-gipsowe'],
        ]);

        // Kategoria główna "Wykończenia" i jej subkategorie
        $wykonczenia = Category::where('slug', 'wykonczenia')->first();
        $wykonczenia->subcategories()->createMany([
            ['name' => 'Farby', 'slug' => 'farby'],
            ['name' => 'Tapety', 'slug' => 'tapety'],
            ['name' => 'Podłogi', 'slug' => 'podlogi'],
        ]);
    }
}
