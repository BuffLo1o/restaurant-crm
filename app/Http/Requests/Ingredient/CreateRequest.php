<?php

namespace App\Http\Requests\Ingredient;

use App\Enums\IngredientMeasureEnum;
use App\Models\File;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => [
                'string',
                'required',
                'max:255',
            ],
            'description' => [
                'string',
                'sometimes',
                'max:65535',
            ],
            'measure' => [
                'string',
                'required',
                Rule::in([
                    IngredientMeasureEnum::ml->name,
                    IngredientMeasureEnum::g->name,
                    IngredientMeasureEnum::piece->name,
                ]),
            ],
            'file_id' => [
                'integer',
                'sometimes',
                Rule::exists(File::class, 'id'),
            ]
        ];
    }
}
