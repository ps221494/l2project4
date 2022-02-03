<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\bestellingen;
Use Cart;
use App\Models\guest;
use App\Models\Pizza;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetial;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        return view('cart', compact('cartItems'));
    }


    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => uniqid(),
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'size' => $request->size,
                'id' => $request->id,
            ),
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('guest.index');
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }


    public function addToBestelling(Request $request)
    {
        $products = \Cart::getContent();
        $oders = Order::all();

        foreach ($products as $item) {
            $order_detail = new OrderDetial();
            foreach ($oders as $oid) {
                $order_detail->order_id = $oid->id;
            }
            $order_detail->pizza_id = $item->attributes->id;
            $order_detail->quantity = $item->quantity;
            $order_detail->size = $item->attributes->size;
            $order_detail->status = "ontvangen";
            $order_detail->save();
        }
        \Cart::clear();
        return redirect()->route('bestelling.detail');
    }

    public function bestelling()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('guest.track', compact('orders'));
    }

}
