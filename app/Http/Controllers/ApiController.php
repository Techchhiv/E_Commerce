<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getAllProducts(){
        $product = Product::with('categories')->get();
        return response()->json(["product"=>$product]);
    }

    public function getProductbyName(Request $request){
        return response()->json(["product"=>Product::where('name',$request->productName)->first()]);
    }

    public function getProductById(Request $request){
        $product = Product::find($request->productId);
        $category = Category::find($product->category_id);
        if($product)
            return response()->json(['product'=>$product,'category'=>$category]);
    }


    public function findByCategory(Request $request){
        // $category = Category::where('name',$request->categoryName)->first();
        // $products = Product::where('category_id',$category->id)->get();
        $products = Category::with('products')->where('name',$request->categoryName)->get();
        
        return response()->json(["category"=>$products]);
        // return response()->json(["category"=>$category->id]);
    }


}
