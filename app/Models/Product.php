<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $fillable = [
        "name",
        "category_id",
        "price",
        "image",
        "description",
        "discount"
    ];

    public function categories(){
        return $this->belongsTo(Category::class, 'id');
    }

    public function carts(){
        return $this->belongsToMany(Cart::class, 'carts')->withPivot('color','quantity');
    }
}
