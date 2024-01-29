<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function InsertProduct(Request $request){
        $validateDate = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'category_id'=>'required|exists:categories,id',
            'discount'=>'nullable|numeric'
        ]);
        
        $product = Product::create($validateDate);

        return response()->json(['message'=>"insert Succesfully"]);
    }
}
