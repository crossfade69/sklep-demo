<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'parent_id'];

    // Relacja do kategorii nadrzędnej
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    // Relacja do kategorii podrzędnych
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    // Relacja do produktów
    public function products()
    {
        return $this->hasManyThrough(
            Product::class,
            Subcategory::class,
            'category_id', // Foreign key on subcategories table
            'subcategory_id', // Foreign key on products table
            'id', // Local key on categories table
            'id' // Local key on subcategories table
        );
    }
}
