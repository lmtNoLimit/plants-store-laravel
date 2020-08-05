<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderDetail;
use App\Product;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::latest()->paginate(10);
        foreach($orders as $order) {
            $order->details;
            foreach($order->details as $item) {
                $item->product = Product::find($item->product_id);
            }
        }
        return view('admin.orders.index', compact('orders'));
    }
}
