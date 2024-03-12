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
            $table->string('title');
            $table->decimal('price', 8, 2);
            $table->string('photo')->nullable();
            /*  $table->foreignId('category_id');
              $table->unsignedBigInteger('category_id');
             $table->foreignId('category_id')->constrained('headphones')->onDelete('cascade'); */
            $table->unsignedBigInteger('category_id')->constrained();
            $table->unsignedBigInteger('user_id');
            $table->boolean('popular_trend')->default(false);
            /*
            $table->foreignId('category_id')->constrained();
            $table->foreignId('user_id');
            */
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

