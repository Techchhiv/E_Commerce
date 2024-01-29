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
        $product = Product::all();
        return response()->json(["product"=>$product]);
    }

    public function getProduct(Request $request){
        return response()->json(["product"=>Product::where('name',$request->productName)->first()]);
    }


    public function findByCategory(Request $request){
        // $category = Category::where('name',$request->categoryName)->first();
        // $products = Product::where('category_id',$category->id)->get();
        $products = Category::with('products')->where('name',$request->categoryName)->get();
        
        return response()->json(["category"=>$products]);
        // return response()->json(["category"=>$category->id]);
    }


}
