<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function InsertCart(Request $request){
        $validateData = $request->validate([
            'user_id' => "required|numeric",
            'product_id' => "required|numeric",
            'color' => "required|string",
            'quantity' => "required|numeric",
        ]);

        Cart::create($validateData);
    
        return response()->json(["message"=>"Insert into cart successfully"]);
    }
}
