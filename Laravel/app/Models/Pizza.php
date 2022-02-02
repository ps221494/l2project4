<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;

    public function Ingredients()
    {
        return $this->belongsToMany(Ingredient::class,'ingredient_pizzas');
    }
    
}
