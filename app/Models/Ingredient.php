<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingredient extends Model
{
    use HasFactory, SoftDeletes;

    public function file(): BelongsTo
    {
        return $this->belongsTo(File::class);
    }

    public function dishes(): BelongsToMany
    {
        return $this->belongsToMany(Dish::class)
            ->using(DishIngredient::class)
            ->withPivot(['amount_ingredient']);
    }
}
