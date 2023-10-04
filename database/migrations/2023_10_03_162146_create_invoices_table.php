<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->string('invoice_id');
            $table->text('items');
            $table->double('amount');
            $table->string('currency');
            $table->text('hash');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->text('address');
            $table->string('city');
            $table->string('country');
            $table->text('delivery_address');
            $table->string('delivery_city');
            $table->string('delivery_country');
            $table->date('estimated_delivery_date');
            $table->boolean('status')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
