<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class productController extends Controller
{
    function addProduct(Request $request){
            $user = Auth::user();  
            $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'user_id' => $user->id, 
        ]);
        return response()->json([
            'message' => 'Product added successfully',
            'product' => $product
        ], 201);
    }

    function getAllProducts(){
        $products = Product::all();
        return response()->json($products, 200);
    }

    function getProduct($id){
        $product = Product::find($id);
        return response()->json($product, 200);
    }

    function updateProduct(Request $request, $id){
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->save();
        return response()->json([
            'message' => 'Product updated successfully',
            'product' => $product
        ], 200);
    }

    function deleteProduct($id){
        $product = Product::find($id);
        $product->delete();
        return response()->json([
            'message' => 'Product deleted successfully'
        ], 200);
    }   
}
