<?php

namespace App\Http\Controllers;

use App\Models\guest;
use App\Models\Pizza;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pizzas = Pizza::all();
        $cartItems = \Cart::getContent();
        return view('guest.index', compact('pizzas', 'cartItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //check if there is any pizza in cart 
        //if there is nothing you get error message back.
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $pizza = Pizza::find($id);
        return view('guest.pizza', compact('pizza'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function edit(guest $guest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, guest $guest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        \Cart::remove($request->id);
        return redirect('guest');
    }
}
