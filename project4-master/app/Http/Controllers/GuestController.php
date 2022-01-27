<?php

namespace App\Http\Controllers;

use App\Models\guest;
use App\Models\Pizza;
use App\Models\Customer;
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
        $pizzaCount = \Cart::getContent()->count();
        if ($pizzaCount > 0) {
            $cartItems = \Cart::getContent();
            return view('guest.bestelling', compact('cartItems'));
        } else {
            return redirect()->back()->with('error', 'Je moet een pizza kiezen als je wilt bestellen!');
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
