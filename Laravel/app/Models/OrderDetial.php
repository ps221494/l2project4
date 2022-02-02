<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetial extends Model
{
    use HasFactory;

    public function pizza(){
        return $this->hasMany(Pizza::class);
    }

    
    
}
