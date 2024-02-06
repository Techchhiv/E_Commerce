<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
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

    public function getCartQauntity($id){
        $cart = User::with('cartProducts')->find($id)->cartProducts;
        return response()->json(["items"=>count($cart)]);
    }

    public function deleteProductCart($userId,$productId){
        try {
            $cartItem = Cart::where('user_id',$userId)->where('product_id',$productId)->first();

            if($cartItem){
                $cartItem->delete();

                return response()->json(['message'=>'success']);
            }

            return response()->json(['message'=>'failed']);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
