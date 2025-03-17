<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            // Check if column exists before trying to drop it
            if (Schema::hasColumn('products', 'category_id')) {
                $table->dropForeign(['category_id']);
                $table->dropColumn('category_id');
            }

            // Add subcategory relationship
            if (!Schema::hasColumn('products', 'subcategory_id')) {
                $table->foreignId('subcategory_id')
                    ->constrained()
                    ->onDelete('cascade');
            }
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            // Add category relationship
            if (!Schema::hasColumn('products', 'category_id')) {
                $table->foreignId('category_id')
                    ->constrained()
                    ->onDelete('cascade');
            }

            // Remove subcategory relationship
            if (Schema::hasColumn('products', 'subcategory_id')) {
                $table->dropForeign(['subcategory_id']);
                $table->dropColumn('subcategory_id');
            }
        });
    }

};
