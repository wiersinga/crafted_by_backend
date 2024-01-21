<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getOrders()
    {
        return  Order::all();
    }

    public function getOrder($id){

        $order = Order::find($id);

        if (!$order){
            return response('Order not Found',404);
        }
        return $order;
    }

    public function storeOrder(Request $request)
    {
        $request->validate([
            'orderNum' =>'required|string',
            'paymentStatus' => 'required|boolean',
            'totalPrice' => 'required|decimal:2',
        ]);

        Order::create($request->all());

        return response('Order created successfully');
    }

    public function updateOrder(Request $request, $id)
    {
        $request->validate([
            'orderNum' =>'required|string',
            'paymentStatus' => 'required|boolean',
            'totalPrice' => 'required|decimal:2',
        ]);

        $order = Order::find($id);

        if (!$order){
            return response('Order not Found',404);
        }
        $order->update($request->all());
        return response('Order updated successfully');
    }

    public function deleteOrder($id)
    {
        $order = Order::find($id);

        if($order){

            $order->delete();
            return response('Order deleted successfully');
        }

        return response('Order not Found',404);
    }
}
