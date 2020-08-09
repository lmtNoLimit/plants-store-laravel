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

    public function update($id, $status) {
        $order = Order::findOrFail($id);
        if($status == 'approve') {
            $order->update([
                'status' => 'Approved'
            ]);
            return redirect()->route('orders.index')->with('success', "Duyệt đơn hàng thành công, đang trong quá trình xử lý");
        } else {
            $order->update([
                'status' => 'Rejected'
            ]);
            return redirect()->route('orders.index')->with('success', "Đã từ chối đơn hàng");
        }
        return redirect()->back()->with('error', "Có lỗi trong quá trình xử lý");
    }
}
