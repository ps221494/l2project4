<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetial extends Model
{
    use HasFactory;

    public function pizza(){
        return $this->belongsTo(Pizza::class);
    }
    
    public function orders(){
        return $this->belongsTo(Order::class,'order_id');
    }

    
    
}
