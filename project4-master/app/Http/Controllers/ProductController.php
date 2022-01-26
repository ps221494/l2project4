<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Oder;
use App\Models\OderDetail;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function productList()
    {
        $products = Product::all();

        return view('products', compact('products'));
    }

    public function cartList()
    {
        return view('cart');
    }

    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('cart.list');
    }

    public function Order(){
        $order = Oder::all();
        return view('store.pizza', compact('order'));
    }

    public function addToOrder(Request $request)
    {
        if (Auth::check()) {
            session()->flash('success', 'Product is Added to Order Successfully !');
            $order = new Oder();
            $order->user_id = Auth::id();
            $order->save();
            return redirect()->route('cart.pizza');
        }
    }

    public function bestellingFinsh(Request $request)
    {
        $products = \Cart::getContent();
        $oders = Oder::all();

        foreach ($products as $item) {
            $order_detail = new OderDetail();
            foreach ($oders as $oid) {
                $order_detail->oder_id = $oid->id;
            }
            $order_detail->product_id = $item->id;
            $order_detail->quantity = $item->quantity;
            $order_detail->save();
        }
        \Cart::clear();
        return view('store.status');
    }
}
