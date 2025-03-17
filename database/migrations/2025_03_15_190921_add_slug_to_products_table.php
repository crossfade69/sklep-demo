<?php

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;


return new class extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            // Sprawdź czy kolumna już istnieje
            if (!Schema::hasColumn('products', 'slug')) {
                $table->string('slug')->after('name')->nullable()->unique();
            }
        });

        // Aktualizuj istniejące rekordy tylko jeśli kolumna istnieje
        if (Schema::hasColumn('products', 'slug')) {
            Product::withoutGlobalScopes()->chunk(200, function ($products) {
                foreach ($products as $product) {
                    $product->update([
                        'slug' => Str::slug($product->name)
                    ]);
                }
            });
        }
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
