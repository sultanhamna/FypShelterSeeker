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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("category_id")->nullable();
            $table->unsignedBigInteger("type_id")->nullable();
            $table->unsignedBigInteger("location_id")->nullable();
            $table->unsignedBigInteger("status_id")->nullable();
            $table->unsignedBigInteger("area_size_id")->nullable();
            $table->unsignedBigInteger("post_id")->nullable();
            $table->decimal('price')->nullable();
            $table->string("description")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
