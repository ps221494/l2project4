<header class="sm:w-5/6 sm:mx-auto sm:py-3">
    <div class="grid grid-cols-1 sm:grid-cols-2 h-36">
        <div class="h-44 md:justify-strat justify-center">
            <img class="p-2 h-full" src="img/Logo.png" alt="logo" />
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
        </div>
        @endif
    </div>
</header>