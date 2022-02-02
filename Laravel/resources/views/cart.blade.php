@extends('layouts.master')
@section('pagetitle','Login')
@section('content')

<div class="container px-6 mx-auto h-screen">

    <div class="flex justify-center my-6">

        <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
            @if ($message = Session::get('success'))
            <div class="p-4 mb-3 bg-green-400 rounded">
                <p class="text-green-800">{{ $message }}</p>
            </div>
            @endif
            @if ($message = Session::get('error'))
            <div class="p-4 mb-3 bg-yellow-400 rounded">
                <p class="text-green-800">{{ $message }}</p>
            </div>
            @endif
            <h3 class="text-3xl text-bold">Cart List</h3>
            <div class="flex-1">
                <table class="w-full text-sm lg:text-base" cellspacing="0">
                    <thead>
                        <tr class="h-12 uppercase">
                            <th class="hidden md:table-cell"></th>
                            <th class="text-left">Name</th>
                            <th class="pl-5 text-left lg:text-left lg:pl-0">
                                <span class="lg:hidden" title="Quantity">Qtd</span>
                                <span class="hidden lg:inline">Quantity</span>
                            </th>
                            <th class="hidden text-left md:table-cell"> Update</th>
                            <th class="hidden text-right md:table-cell"> Remove </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $item)
                        <tr>
                            <td class="hidden pb-4 md:table-cell">
                                <a href="#">
                                    <img src="img/pizza_home_page_background.png" alt="" class="w-20 rounded" alt="Thumbnail">
                                </a>
                            </td>
                            <td>
                                <a href="#">
                                    <p class="mb-2 md:ml-4">{{ $item->name }}</p>

                                </a>
                            </td>
                            <form action="{{ route('cart.update') }}" method="POST">
                                @csrf
                                <td class="justify-center mt-6  md:flex">
                                    <div class="h-10 w-28">
                                        <input type="hidden" name="id" value="{{ $item->id}}">
                                        <input type="number" name="quantity" value="{{ $item->quantity }}" class="w-16 rounded" />
                                    </div>
                                </td>
                                <td class=" text-left">
                                    <div class="h-10 w-28">
                                        <button type="submit" class="rounded px-4 py-2  text-white bg-blue-500">update</button>
                                    </div>
                                </td>
                            </form>
                            <td class="hidden text-right md:table-cell">
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $item->id }}" name="id">
                                    <button class="px-4 py-2 text-white bg-red-600 rounded">x</button>
                                </form>

                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                <div>
                    Total: ${{ Cart::getTotal() }}
                </div>
                <div>
                    <div class="py-4">
                        <a href="guest" class="px-6 py-2 text-white bg-yellow-400 rounded">Back To Shop</a>
                    </div>
                </div>
                <div>
                    <div class="py-4">
                        <a href="{{route('bestelling.create')}}" class="px-3 py-2 bg-green-300 text-white text-xs font-bold uppercase rounded">Volgende </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection