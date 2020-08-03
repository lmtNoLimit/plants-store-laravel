<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Cart;
use App\CartDetail;

class CartController extends Controller
{
    public function index(Request $request) {
        $categories = Category::latest()->get();
        $cart = (Cart::where('user_id', auth()->user()->id)->get())[0];
        $cartDetails = CartDetail::where('cart_id', $cart->id)->get();
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
}
