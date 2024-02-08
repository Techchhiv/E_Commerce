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
            'image' => 'nullable|string',
            'category_id'=>'required|exists:categories,id',
            'discount'=>'nullable|numeric'
        ]);
        
        $product = Product::create($validateDate);

        return response()->json(['message'=>"insert Succesfully"]);
    }

    public function updateProduct(Request $request, $id){
        
        if($id){
            $product = Product::findOrFail($id);
            $value = [
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'image' => $request->image,
                'category_id'=> $request->category_id,
                'discount'=> $request->discount
            ];
    
            $update = $product->update($value);

            if($update){
                return response()->json(['message'=>'success']);
            }else
                return response()->json(['message'=>'failed']);
        }

        return response()->json(['message'=>'no id']);

    }

    public function deleteProduct($id){
        $product = Product::findOrFail($id);

        if($product){
            $product->delete();
            return response()->json(['message'=>'success']);
        }
        return response()->json(['message'=>'fail']);
    }
}
