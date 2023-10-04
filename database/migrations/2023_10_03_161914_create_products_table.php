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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->double('product_price');
            $table->text('product_description');
            $table->integer('product_discount_percentage');
            $table->integer('product_qty');
            $table->foreignId('product_stocks_id')->constrained('stocks');
            $table->foreignId('product_categories_id')->constrained('categories');
            $table->foreignId('product_brands_id')->constrained('brands');
            $table->foreignId('product_users_id')->constrained('users');
            $table->integer('product_status')->default(1);
            $table->text('product_image_url');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
