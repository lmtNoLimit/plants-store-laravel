<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Cart;
use App\CartDetail;
use App\Order;
use App\OrderDetail;

class CartController extends Controller
{
    public function index(Request $request) {
        $categories = Category::latest()->get();
        $cart = Cart::where('user_id', auth()->user()->id)->get();
        if(auth()->user() && sizeof($cart) == 0) {
            $cart = new Cart([
                'user_id' => auth()->user()->id,
            ]);
            $cart->save();
            $cartId = $cart->id;
        } else {
            $cartId = $cart[0]->id;
        }
        $cartDetails = CartDetail::where('cart_id', $cartId)->get();
        foreach($cartDetails as $item) {
            $item->product = Product::find($item->product_id);
        }
        return view('client.shopping-cart', compact('categories', 'cartDetails'));
    }

    public function addToCart(Request $request, $productId) {
        $cart = Cart::where('user_id', auth()->user()->id)->get();
        if(auth()->user() && sizeof($cart) == 0) {
            $cart = new Cart([
                'user_id' => auth()->user()->id,
            ]);
            $cart->save();
            $cartId = $cart->id;
        } else {
            $cartId = $cart[0]->id;
        }

        $quantity = $request->input('quantity') ?? 1;
        $cartDetail = CartDetail::where('cart_id', $cartId)
            ->where('product_id', $productId)
            ->get();

        if(sizeof($cartDetail) == 0) {
            CartDetail::create([
                'cart_id' => $cartId,
                'product_id' => $productId,
                'quantity' => $quantity
            ]);
        } else {
            $cartDetail[0]->update([
                'quantity' => $cartDetail[0]->quantity + $quantity
            ]);
        }

        return redirect()->route('client_cart');
    }

    public function removeItemFromCart($productId) {
        $cart = Cart::where('user_id', auth()->user()->id)->get();
        $cartId = $cart[0]->id;
        
        $cartDetail = CartDetail::where('cart_id', $cartId)
            ->where('product_id', $productId)
            ->delete();
        return redirect()->route('client_cart');
    }

    public function getCheckout() {
        $categories = Category::latest()->get();
        $cart = Cart::where('user_id', auth()->user()->id)->get();
        if(auth()->user() && sizeof($cart) == 0) {
            $cart = new Cart([
                'user_id' => auth()->user()->id,
            ]);
            $cart->save();
            $cartId = $cart->id;
        } else {
            $cartId = $cart[0]->id;
        }
        $cartDetails = CartDetail::where('cart_id', $cartId)->get();
        foreach($cartDetails as $item) {
            $item->product = Product::find($item->product_id);
        }
        return view('client.checkout', compact('categories', 'cartDetails'));
    }

    public function checkout(Request $request) {
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->name = $request->input('name');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->status = 'Pending';
        $order->address = $request->input('address');
        $order->save();
        $cart = (Cart::where('user_id', auth()->user()->id)->get())[0];
        $cartDetails = CartDetail::where('cart_id', $cart->id)->get();
        foreach($cartDetails as $cartItem) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity
            ]);
        }
        foreach($cartDetails as $cartItem) {
            $cartItem->delete();
        }
        (Cart::where('user_id', auth()->user()->id)->get()[0])->delete();
        return redirect()->route('homepage')->with('success-popup', 'Cảm ơn bạn đã mua hàng. Sản phẩm sẽ được gửi đến bạn trong khoảng từ 3-5 ngày tới');
    }
}
