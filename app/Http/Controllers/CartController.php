<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function InsertCart(Request $request){
        $request->validate([
            'user_id' => 'required',
            'product_id' => 'required',
            'color' => 'required',
            'quantity' => 'required',
            'size' => 'required',
        ]);
        $attributes = [
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
        ];
        
        $values = [
            'color' => $request->color,
            'size' => $request->size,
            'quantity' => $request->quantity,
        ];
    
        $inserted = Cart::updateOrInsert($attributes, $values);
    
        if($inserted)
            return response()->json(["message"=>"success"]);
        else
            return response()->json(["message"=>"fail"]);    
    }
}
