<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Subcategory::create(['name' => 'Cement i wapno', 'category_id' => 1]);
        Subcategory::create(['name' => 'Stal budowlana', 'category_id' => 1]);
        // Dodaj więcej podkategorii
    }
}
