<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Routing\Controller;

class OrderController extends Controller
{
    public function index()
    {
        return  OrderResource::collection(Order::all());
    }

    public function show($id){

        return new OrderResource(Order::findOrFail($id));
    }

    public function store(StoreOrderRequest $request)
    {
        $order = Order::create($request->all());
        return new OrderResource($order);
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->all());
        return new OrderResource($order);

    }

    public function destroy(Order $order)
    {
       $order->delete();
       return  OrderResource::collection(Order::all());
    }
}
