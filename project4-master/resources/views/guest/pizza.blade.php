@extends('layouts.master')
@section('pagetitle','Login')
@section('content')

<section class="relative">
    <h1 class="title text-center">Pizza information</h1>
    <div class="sm:w-4/6 sm:mx-auto  flex flex-col-reverse lg:flex-row items-center gap-12 mt-14 lg:mt-24">
        <!-- Image -->
        <div class="flex justify-center flex-1 mb-10 md:mb-16 lg:mb-0 z-10">
            <img class="w-4/6 h-4/6 sm:w-2/4 sm:h-2/4 md:w-full md:h-full" src="{{asset('img/pizza_home_page_background.png')}}" alt="" />
        </div>
        <!-- Content -->
        <div class="flex flex-1 flex-col items-center lg:items-start">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        pizza Name
                    </label>
                    <h2>{{$pizza->Name}}</h2>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Beschrijving
                    </label>
                    <h4>{{$pizza->Beschrijving}}</h4>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                       ingredienten
                    </label>
                    @foreach ($pizza->ingredients as $ingredient)
                    <h4>{{$ingredient->Name}}</h4>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>


@endsection