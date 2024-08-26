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
            $table->string("product_type")->nullable();
            $table->string("product_address")->nullable();
            $table->decimal("product_price" , 10, 2)->nullable();
            $table->string("product_size")->nullable();
            $table->string("product_status")->nullable();
            $table->string("product_discription")->nullable();
            $table->year("product_year_built")->nullable();
            $table->unsignedBigInteger("category_id")->nullable();
            $table->timestamps();



            // Adding indexes for better search performance
           // $table->index('product_type');
           // $table->index('product_address');
           // $table->index('product_price');
           // $table->index('product_status');
          //  $table->index('product_discription');
          //  $table->index('product_year_built');
           // $table->index('category_id');


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
