@extends('layouts.master')
@section('pagetitle','Login')
@section('content')

<div class="container px-6 mx-auto">
    <div class="flex justify-center my-6">
        <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
            @if ($message = Session::get('success'))
            <div class="p-4 mb-3 bg-green-400 rounded">
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
                            <th class="pl-5 text-left lg:text-right lg:pl-0">
                                <span class="lg:hidden" title="Quantity">Qtd</span>
                                <span class="hidden lg:inline">Quantity</span>
                            </th>
                            <th class="hidden text-right md:table-cell"> Update</th>
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
                            <td class="justify-center mt-6  md:flex">
                                <div class="h-10 w-28">
                                    <div class="relative flex flex-row w-full h-8">

                                        <form action="{{ route('cart.update') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $item->id}}">
                                            <input type="number" name="quantity" value="{{ $item->quantity }}" class="w-14 rounded" />
                                        </form>
                                    </div>
                                </div>
                            </td>
                            <td class="hidden text-right md:table-cell">
                                <span class="text-sm font-medium lg:text-base">
                                    <button type="submit" class="rounded px-4 py-2  text-white bg-blue-500">update</button>
                                </span>
                            </td>
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
                        @foreach ($cartItems as $item)
                        <form action="bestelling" method="post">
                            @csrf
                            <input type="hidden" name="Name" value="{{ $item->name }}"/>
                            <input type="submit" value="Bestelling plaatsen" class="px-6 py-2 text-white bg-green-300 rounded" />
                        </form>
                        @endforeach
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

@endsection