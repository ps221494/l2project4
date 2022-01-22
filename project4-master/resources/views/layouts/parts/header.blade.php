<header class="container sm:mx-auto sm:py-3">
    <div class="grid grid-cols-1 sm:grid-cols-2 h-36">
        <div class="h-44 md:justify-strat justify-center">
            <a href="/" class=""><img class="p-2 h-full" src="{{asset('img/Logo.png')}}" alt="logo" /></a>
        </div>
        @if (Route::has('login'))
        <div class="h-44 flex flex-1 sm:justify-end justify-center items-center ">
            @auth
            <a href="{{ url('/dashboard') }}" class="p-2 h-10 text-lg text-gray-700 dark:text-gray-500 ">Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="p-2 h-10 text-lg text-gray-700 dark:text-gray-500 ">Log in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="p-2 h-10 text-lg text-gray-700 dark:text-gray-500 ">Register</a>
            @endif
            @endauth
            <a href="{{ route('cart.list') }}" class="flex items-center">
                            <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            {{ Cart::getTotalQuantity()}}
                        </a>
        </div>
        @endif
    </div>
</header>