<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $category1 = Category::create([
            'name' => 'Dach',
            'slug' => 'dach'
        ]);
        
        $subcategories = [
            ['name' => 'Wełna wewnętrzna Dach', 'slug' => 'welna-wewnetrzna-dach'],
            ['name' => 'Dachy płaskie', 'slug' => 'dachy-plaskie'],
            ['name' => 'Dachy skośne', 'slug' => 'dachy-skosne'],
            ['name' => 'Rynny', 'slug' => 'rynny'],
        ];
        
        foreach ($subcategories as $sub) {
            Category::create([
                'name' => $sub['name'],
                'slug' => $sub['slug'],
                'parent_id' => $category1->id
            ]);
        }
        
        dd(Category::all()); // <-- sprawdźmy, czy kategorie się tworzą
        
    }
}
