<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('product_id');
            $table->integer('product_quantity'); 
            $table->decimal('product_price', 9, 2); 
            $table->decimal('cargo_price',9,2); 
            $table->string('order_code'); 
       
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
