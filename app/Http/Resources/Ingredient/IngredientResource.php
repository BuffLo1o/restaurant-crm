<?php

namespace App\Http\Resources\Ingredient;

use App\Http\Resources\JsonResource;
use App\Models\Ingredient;
use Illuminate\Http\Request;

/**
 * @property Ingredient $resource
 *
 * @mixin Ingredient
 */
class IngredientResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'title'       => $this->title,
            'measure'     => $this->measure->name,
            'description' => $this->description,
        ];
    }
}
