<?php

namespace App\Http\Controllers;

use App\Http\Requests\Ingredient\CreateRequest;
use App\Http\Requests\Ingredient\UpdateRequest;
use App\Http\Resources\File\FileResource;
use App\Http\Resources\Ingredient\IngredientResource;
use App\Models\File;
use App\Models\Ingredient;
use App\Services\IngredientManager\IngredientManager;

class IngredientController extends Controller
{
    private IngredientManager $ingredientManager;

    public function __construct(IngredientManager $ingredientManager)
    {
        $this->ingredientManager = $ingredientManager;
    }

    public function get(Ingredient $ingredient)
    {
        $ingredient->loadMissing(['file']);

        return IngredientResource::make($ingredient)
            ->withRelations([
                'file' => [
                    'resource' => FileResource::class,
                    'relation' => 'file',
                ]
            ]);
    }

    public function create(CreateRequest $request)
    {
        $file = $request->has('file') ?
            File::find($request->input('file_id')) :
            null;

        $ingredient = $this->ingredientManager->create(
            $request->input('title'),
            $request->input('measure'),
            $file,
            $request->input('description')
        );

        $ingredient->loadMissing(['file']);

        return IngredientResource::make($ingredient)
            ->withRelations([
                'file' => [
                    'resource' => FileResource::class,
                    'relation' => 'file',
                ]
            ]);
    }

    public function update(UpdateRequest $request, Ingredient $ingredient)
    {
        $file = $request->has('file') ?
            File::find($request->input('file_id')) :
            null;

        $ingredient = $this->ingredientManager->update(
            $ingredient,
            $request->input('title'),
            $request->input('measure'),
            $file,
            $request->input('description')
        );

        $ingredient->loadMissing(['file']);

        return IngredientResource::make($ingredient)
            ->withRelations([
                'file' => [
                    'resource' => FileResource::class,
                    'relation' => 'file',
                ]
            ]);
    }
}
