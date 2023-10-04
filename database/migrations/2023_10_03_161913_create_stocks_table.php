<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('stock_product_name');
            $table->integer('stock_qty');
            $table->double('stock_unit_price');
            $table->integer('stock_discount')->default(0);
            $table->foreignId('stock_users_id')->constrained('users');
            $table->foreignId('stock_categories_id')->constrained('categories');
            $table->foreignId('stock_brands_id')->constrained('brands');
            $table->string('stock_image_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
