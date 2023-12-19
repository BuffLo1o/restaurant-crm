<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dish extends Model
{
    use HasFactory, SoftDeletes;

    public function file(): BelongsTo
    {
        return $this->belongsTo(File::class);
    }

    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class)
            ->using(DishIngredient::class)
            ->withPivot('amount_ingredient');
    }

    public function menus(): BelongsToMany
    {
        return $this->belongsToMany(Menu::class)
            ->using(DishMenu::class);
    }
}
