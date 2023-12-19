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
        Schema::create('dish_menu', function (Blueprint $table) {
            $table->id();

            $table->foreignId('dish_id')->constrained();
            $table->foreignId('menu_id')->constrained();

            $table->index(['dish_id']);
            $table->index(['menu_id']);
            $table->index(['dish_id', 'menu_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dish_menu');
    }
};
