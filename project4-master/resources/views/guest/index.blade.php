@extends('layouts.master')
@section('pagetitle','Login')
@section('content')

<section class="hero-section relative sm:mt-20">
    <h1 class="text-center font-semibold">StonksPizza Pizza's</h1>
    <div class="sm:w-4/6 sm:mx-auto flex flex-col-reverse lg:flex-row items-center gap-12 mt-14 lg:mt-24">
        <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">
            <!--Card 1-->
            @foreach($pizzas as $items)
            <div class="rounded overflow-hidden shadow-lg">
                <a href="#"><img class="w-full" src="img/pizza_home_page_background.png" alt="Pizza images" /></a>
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">{{$items->Name}}</div>
                    <p class="text-gray-700 text-base">{{$items->Beschrijving}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    </div>
</section>

@endsection