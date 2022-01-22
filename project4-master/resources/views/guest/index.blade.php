@extends('layouts.master')
@section('pagetitle','Login')
@section('content')

<section class="hero-section relative sm:mt-20">
    <h1 class="text-center font-semibold">StonksPizza Pizza's Menu</h1>
    <div class="sm:w-4/6 sm:mx-auto flex flex-col-reverse lg:flex-row items-center gap-12 mt-14 lg:mt-24">
        <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">
            <!--Card 1-->
            @foreach($pizzas as $items)
            <div class="rounded overflow-hidden shadow-lg">
                <a href="{{route('guest.show',$items->id)}}"><img class="w-full" src="img/pizza_home_page_background.png" alt="Pizza images" /></a>
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">{{$items->Name}}</div>
                    <p class="text-gray-700 text-base">{{$items->Beschrijving}}</p>
                    <select class="form-control rounded mb-2">
                        <option>(25cm) NY style</option>
                        <option>(30cm) NY style</option>
                        <option>(35cm) NY style</option>
                    </select>
                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $items->id }}" name="id">
                        <input type="hidden" value="{{ $items->Name }}" name="name">
                        <input type="hidden" value="12" name="price">
                        <input type="hidden" value="1" name="quantity">
                        <button class="p-2 rounded-lg text-White font-semibold hover:text-White transition duration-300 hover:no-underline bg-green-500">Bestellen</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    </div>
</section>

@endsection