<?php

namespace App\Services\IngredientManager;

use App\Models\File;
use App\Models\Ingredient;

class IngredientManager
{
    public function create(string $title, string $measure, ?File $file, ?string $description): Ingredient
    {
        $ingredient = new Ingredient();

        $ingredient->title = $title;
        $ingredient->measure = $measure;
        $ingredient->description = $description;

        $ingredient->file()->associate($file);

        $ingredient->save();

        return $ingredient;
    }

    public function update(Ingredient $ingredient, string $title, string $measure, ?File $file, ?string $description): Ingredient
    {
        $ingredient->title = $title;
        $ingredient->measure = $measure;
        $ingredient->description = $description;

        $ingredient->file()->associate($file);

        $ingredient->save();

        return $ingredient;
    }
}
