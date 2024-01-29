<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    protected $fillable= ['name'];

    public function products(){
        // give the name category_id to refer to the products table that have category_id
        return $this->hasMany(Product::class, 'category_id');
    }
}
