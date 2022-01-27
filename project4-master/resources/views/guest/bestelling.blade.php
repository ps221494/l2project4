@extends('layouts.master')
@section('pagetitle','Login')
@section('content')
<div class="container h-screen py-10 px-20 flex justify-around">
    <div class="block p-6">
        @if(Auth::guest())
        <form>
            <div class="grid grid-cols-2 gap-4">
                <div class="form-group mb-6">
                    <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="" aria-describedby="emailHelp123" placeholder="First name" value="">
                </div>
                <div class="form-group mb-6">
                    <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="" aria-describedby="emailHelp123" placeholder="Last name">
                </div>
            </div>
            <div class="form-group mb-6">
                <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="" aria-describedby="emailHelp123" placeholder="Adress">

            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="form-group mb-6">
                    <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="" aria-describedby="emailHelp123" placeholder="Post Code">
                </div>
                <div class="form-group mb-6">
                    <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="" aria-describedby="emailHelp123" placeholder="City">
                </div>
            </div>
            <div class="form-group mb-6">
                <input type="nummer" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="" aria-describedby="emailHelp123" placeholder="Number">
            </div>
        </form>
        @else
        <form>
            <div class="grid grid-cols-2 gap-4">
                <div class="form-group mb-6">
                    <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="" aria-describedby="emailHelp123" placeholder="First name" value="">
                </div>
                <div class="form-group mb-6">
                    <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="" aria-describedby="emailHelp123" placeholder="Last name">
                </div>
            </div>
            <div class="form-group mb-6">
                <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="" aria-describedby="emailHelp123" placeholder="Adress" value="">

            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="form-group mb-6">
                    <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="" aria-describedby="emailHelp123" placeholder="Post Code">
                </div>
                <div class="form-group mb-6">
                    <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="" aria-describedby="emailHelp123" placeholder="City">
                </div>
            </div>
            <div class="form-group mb-6">
                <input type="nummer" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="" aria-describedby="emailHelp123" placeholder="Number" value="">
            </div>
        </form>
        @endif
    </div>

    <div class="hidden sm:block">
        <div class="max-h-full h-80 bg-gray-100 rounded">
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
                <a href="bestelling" class="px-3 py-2 mb-4 bg-green-300 text-white text-xs font-bold uppercase rounded">Check out</a>
            </div>
        </div>
    </div>

</div>

@endsection