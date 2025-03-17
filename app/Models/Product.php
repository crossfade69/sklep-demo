<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'image',
        'subcategory_id',
        'stock'
    ];

    // Add the scope method
    public function scopeLatestUpdated($query)
    {
        return $query->latest('updated_at');
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function category()
    {
        return $this->hasOneThrough(
            Category::class,
            Subcategory::class,
            'id', // Klucz obcy w podkategorii
            'id', // Klucz obcy w kategorii
            'subcategory_id', // Lokalny klucz w produktach
            'category_id' // Lokalny klucz w podkategoriach
        );
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}