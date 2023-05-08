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
        Schema::create('laptops', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('imageurl1');
            $table->string('cpu');
            $table->string('ram');
            $table->string('gpu');
            $table->string('storage');
            $table->string('display');
            $table->string('battery');
            $table->double('price');
            $table->text('description')->nullable();
            $table->string('recommend')->nullable();
            $table->string('pro')->nullable();
            $table->string('con')->nullable();
            $table->string('link_youtube')->nullable();
            $table->string('shop_name')->nullable();
            $table->string('location')->nullable();
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laptops');
    }
};
