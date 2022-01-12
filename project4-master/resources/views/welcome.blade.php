@extends('layouts.master')

@section('pagetitle','Home')
@section('content')
<section class="relative">
    <div class="sm:w-4/6 sm:mx-auto  flex flex-col-reverse lg:flex-row items-center gap-12 mt-14 lg:mt-12">
        <!-- Content -->
        <div class="flex flex-1 flex-col items-center lg:items-start">
            <h2 class="text-bookmark-blue text-3xl md:text-4 lg:text-5xl text-center lg:text-left mb-6">
                StonsPizza store
            </h2>
            <p class="text-bookmark-grey text-lg text-left lg:text-left px-2 mb-6">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                when an unknown printer took a galley of type and scrambled it to make a type specimen book.
            </p>
            <div class="flex justify-center flex-wrap gap-6">
                <a href="#" class="p-2 m-2 rounded-lg text-black font-semibold hover:text-White transition duration-300 hover:no-underline bg-green-500">Order Pizza</a>
            </div>
        </div>
        <!-- Image  -->
        <div class="flex justify-center flex-1 mb-10 md:mb-16 lg:mb-0 z-10">
            <img class="w-4/6 h-4/6 sm:w-2/4 sm:h-2/4 md:w-full md:h-full" src="img/pizza_home_page_background.png" alt="" />
        </div>
    </div>
</section>

<!-- hero section -->
<section class="hero-section relative sm:mt-20">
    <h1 class="text-center font-semibold">Nu in aanbeding</h1>
    <div class="sm:w-4/6 sm:mx-auto flex flex-col-reverse lg:flex-row items-center gap-12 mt-14 lg:mt-24">
        <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">
            <!--Card 1-->
            <div class="rounded overflow-hidden shadow-lg">
                <img class="w-full" src="img/pizza_home_page_background.png" alt="Mountain">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">Pizza Hawai</div>
                    <p class="text-gray-700 text-base">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, Nonea! Maiores et perferendis eaque, exercitationem praesentium nihil.
                    </p>
                </div>
            </div>
            <!--Card 2-->
            <div class="rounded overflow-hidden shadow-lg">
                <img class="w-full" src="img/pizza_home_page_background.png" alt="River">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">Pizza tonijn</div>
                    <p class="text-gray-700 text-base">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, Nonea! Maiores et perferendis eaque, exercitationem praesentium nihil.
                    </p>
                </div>
            </div>

            <!--Card 3-->
            <div class="rounded overflow-hidden shadow-lg">
                <img class="w-full" src="img/pizza_home_page_background.png" alt="Forest">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">Pizza magarita</div>
                    <p class="text-gray-700 text-base">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, Nonea! Maiores et perferendis eaque, exercitationem praesentium nihil.
                    </p>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection