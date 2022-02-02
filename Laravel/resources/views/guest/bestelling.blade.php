@extends('layouts.master')
@section('pagetitle','Login')
@section('content')
<div class="container h-screen py-10 px-20 flex justify-around">
    <div class="block p-6 w-1/2 ">
        <div>
            <h1 class="text-gray-200">Bestelling detail</h1>
        </div>
        @if(Auth::check())
        <form>
            <div class="grid grid-cols-2 gap-4">
                <div class="form-group mb-6">
                    <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" value="{{$customer->first_name}}">
                </div>
                <div class="form-group mb-6">
                    <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" value="{{$customer->last_name}}">
                </div>
            </div>
            <div class="form-group mb-6">
                <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" value="{{$customer->address}}">

            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="form-group mb-6">
                    <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" value="{{$customer->zipcode}}">
                </div>
                <div class="form-group mb-6">
                    <input type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" value="{{$customer->city}}">
                </div>
            </div>
            <div class="form-group mb-6">
                <input type="nummer" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" value="{{$customer->phone}}">
            </div>
        </form>
        <div class="flex  form-group mt-8">
            <input type="checkbox" />
            <p class="mx-4">It has survived not only five centuries,
                but also the leap into electronic typesetting,
                remaining essentially unchanged.
                It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>
        </div>
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
        <div class="flex  form-group mt-8">
            <input type="checkbox" />
            <p class="mx-4">It has survived not only five centuries,
                but also the leap into electronic typesetting,
                remaining essentially unchanged.
                It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>
        </div>
        @endif
        <div class="flex justify-center">
            <form action="{{route('bestelling.store')}}" method="POST">
                @csrf
                <input type="submit" class="px-20 py-2 mb-4 hover:bg-green-200 bg-green-300 text-white text-xs font-bold uppercase rounded" value="Checkout" />
            </form>
        </div>
    </div>

    <div class="hidden sm:block ">
        <div class=" rounded bg-white shadow-lg p-2">
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
                        <p class="mt-3 text-gray-600 text-base">{{$item->attributes->size}}</p>
                    </div>
                    <div></div>

                </div>
                @endforeach
                <div class="px-2 mt-16 flex justify-between">
                    <h1 class="text-gray-700 font-bold text-xl"> TOTAAL</h1>
                    <h1 class="text-gray-700 font-bold text-xl">€ ${{ Cart::getTotal() }}</h1>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection