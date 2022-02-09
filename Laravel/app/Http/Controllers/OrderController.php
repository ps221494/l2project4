<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\bestellingen;
use Cart;
use App\Models\guest;
use App\Models\Pizza;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetial;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $customer = Customer::find(Auth::id());
        $orders = Order::where('user_id', Auth::id())->get();
        return view('guest.track', compact('orders','customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (Auth::check()) {
            $pizzaCount = \Cart::getContent()->count();
            if ($pizzaCount > 0) {
                $cartItems = \Cart::getContent();
                $customer = Customer::find(Auth::id());
                $order = new Order();
                $order->user_id = Auth::id();
                $order->save();
                return view('guest.bestelling', compact('cartItems', 'customer'));
            } else {
                return redirect()->back()->with('error', 'Je moet een pizza kiezen als je wilt bestellen!');
            }
        } else {
            return redirect('/login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return redirect()->route('bestelling.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $order_detail = OrderDetial::find($id);
        if($order_detail->status == 'ontvangen')
        {
            $order_detail->delete();
            return redirect()->route('bestelling.index');
        }
        else{
            return redirect()->back()->with('error', 'U kunt alleen pizzas verwijderen dat ontvangen als status hebben!');
        }
    }
}
