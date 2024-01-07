<?php

namespace Database\Factories;

use App\Enums\IngredientMeasureEnum;
use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Factories\Factory;

class IngredientFactory extends Factory
{
    protected $model = Ingredient::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'measure' => IngredientMeasureEnum::g->name,
        ];
    }
}
