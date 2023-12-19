<?php

use App\Enums\IngredientMeasureEnum;
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
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->text('description')->nullable();

            $table->enum('measure', [
                IngredientMeasureEnum::piece->name,
                IngredientMeasureEnum::g->name,
                IngredientMeasureEnum::ml->name,
            ]);

            $table->foreignId('file_id')
                ->nullable()
                ->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredients');
    }
};
