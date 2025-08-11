<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class orderController extends Controller
{
    function addOrder(Request $request){
        $order = Order::create([
            'user_id' => $request->user()->id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total_price'=>Product::find($request->product_id)->price * $request->quantity,
        ]);
        return response()->json([
            'message' => 'Order added successfully',
            'order' => $order
        ], 201);
    }

    function getAllOrders(){
    $order = Order::all();
    return response()->json($order, 200);
    }

    function getOrder($id){
        $order = Order::find($id);
        return response()->json($order, 200);
    }

    function updateOrder(Request $request, $id){
        $order = Order::find($id);
        $order->user_id = $request->user_id;
        $order->product_id = $request->product_id;
        $order->quantity = $request->quantity;
        $order->total_price = Product::find($request->product_id)->price * $request->quantity;
        $order->save();
        return response()->json([
            'message' => 'order updated successfully',
            'order' => $order
        ], 200);
    }

    function deleteOrder($id){
        $order = Order::find($id);
        $order->delete();
        return response()->json([
            'message' => 'order deleted successfully'
        ], 200);
    } 
}
