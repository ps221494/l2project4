@extends('layouts.master')
@section('pagetitle','Login')
@section('content')

<!--left section with pizzas-->
<div class="container grid sm:grid-cols-4 grid-col-1 grid-row-5 gap-x-5 ">
    <div class="sm:col-span-3 w-full">
        <div class="w-full">
            @if ($message = Session::get('error'))
            <div class="p-4 mb-3 bg-yellow-400 rounded">
                <p class="text-green-800">{{ $message }}</p>
            </div>
            @endif
            <div class="text-left">
                <h1 class="font-sans text-5xl text h-14">Pizza menu</h1>
            </div>
            <div class="relative h-full grid grid-cols-2 gap-x-5">
                @foreach($pizzas as $pizza)
                <div class="h-52">
                    <div class="h-full">
                        <div class="flex max-w-md bg-white shadow-lg rounded-lg overflow-hidden">
                            <div class="w-1/3 bg-cover flex items-center"><img alt="" src="img/pizza_home_page_background.png" alt="" /></div>
                            <div class="w-2/3 p-2">
                                <h1 class="text-gray-900 font-bold text-2xl">{{$pizza->name}}</h1>
                                <p class="mt-2 text-gray-600 text-sm">{{$pizza->description}}</p>
                                <select class="rounded w-full">
                                    <option value="(25)cm">(25)cm NY style</option>
                                    <option value="(30)cm">(30)cm NY style</option>
                                    <option value="(35)cm">(35)cm NY style</option>
                                </select>
                                <div class="flex item-center justify-between mt-3">
                                    <h1 class="text-gray-700 font-bold text-xl">€</h1>
                                    <form action="{{ route('cart.store') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$pizza->id}}" />
                                        <input type="hidden" name="name" value="{{$pizza->name}}" />
                                        <input type="hidden" name="price" value="12.42" />
                                        <input type="hidden" name="quantity" value="1" />
                                        <input type="submit" class="px-3 py-2 bg-green-300 text-white text-xs font-bold uppercase rounded" value="Add to Card" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>


    <!--right section pizza cart-->
    <div class="hidden sm:block rounded bg-white shadow-lg p-2 min-h-screen">
        <div class="h-full h-80 ">
            <div class="p-2">
                <h1 class="text-gray-900 font-bold text-2xl"> Bestelling</h1>
            </div>
            <div>
                @foreach ($cartItems as $item)
                <div class="">
                    <div class="px-2 mt-3 flex justify-between">
                        <h1 class="text-gray-500 font-bold text-xl">{{$item->quantity}} X PIZZA {{$item->name}}</h1>
                        <h1 class="text-gray-500 font-bold text-xl">€{{$item->price}}</h1>
                    </div>
                    <div>
                        <form action="{{ route('guest.destroy',$item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" value="{{ $item->id }}" name="id">
                            <button class="px-6 py-1 text-white bg-gray-600 rounded">verwijderen</button>
                        </form>
                    </div>
                    <div>
                        <p class="mt-3 text-gray-600 text-base">(25)cm ny style</p>
                    </div>
                    <div></div>

                </div>
                @endforeach
                <div class="px-2 mt-16 flex justify-between">
                    <h1 class="text-gray-700 font-bold text-xl"> TOTAAL</h1>
                    <h1 class="text-gray-700 font-bold text-xl">€ ${{ Cart::getTotal() }}</h1>
                </div>
            </div>
            <div class="flex justify-end">
                <a href="{{route('guest.create')}}" class="px-3 py-2 bg-green-300 text-white text-xs font-bold uppercase rounded">Volgende </a>
            </div>
        </div>
    </div>
</div>
@endsection