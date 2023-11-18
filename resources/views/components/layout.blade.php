<!doctype html>

<title>Shoes Market</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<style>
    html {
        scroll-behavior: smooth;
    }

    .clamp {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .clamp.one-line {
        -webkit-line-clamp: 1;
    }
</style>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/" class='flex justify-center items-center gap-3'>
                    <img src="/images/sport-shoe.png" alt="Laracasts Logo" width="50" height="5">
                    <h1 class="text-lg font-bold">Shoe Market</h1>
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center">
                @auth
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button class="text-xs font-bold uppercase">
                                Welcome, {{ auth()->user()->name }}!
                            </button>
                        </x-slot>

                        <x-dropdown-item
                            href="#"
                            x-data="{}"
                            @click.prevent="document.querySelector('#logout-form').submit()"
                        >
                            Log Out
                        </x-dropdown-item>
                        <form id="logout-form" method="POST" action="/logout" class="hidden">
                            @csrf
                        </form>

                        <x-dropdown-item
                            href="/orderHistory"
                        >
                            Your Orders
                        </x-dropdown-item> 
                    </x-dropdown>
                @else
                    <a href="/register"
                       class="text-xs font-bold uppercase {{ request()->is('register') ? 'text-blue-500' : '' }}">
                        Register
                    </a>

                    <a href="/login"
                       class="ml-6 text-xs font-bold uppercase {{ request()->is('login') ? 'text-blue-500' : '' }}">
                        Log In
                    </a>
                @endauth

                <a href="/placeShoe"
                   class="bg-gray-200 ml-3 rounded-full text-xs font-semibold text-black font-bold uppercase py-3 px-5">
                 Place your offer
                </a>

                @if(Auth::user())
                <a href="/yourCart"
                   class="bg-red-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    {{ Auth::user()->shoes()->count() }} Your Cart
                </a>
                @else
                <a href="/yourCart"
                   class="bg-red-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                 Your Cart
                </a>
                @endif
            </div>
        </nav>

        {{ $slot }}

    </section>

    <x-flash/>
</body>
