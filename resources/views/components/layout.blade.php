<!doctype html>

<title>Laravel TODO LIST</title>
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
                <a href="/">
                    <img src="/todo-logo.jpg" alt="Todo Logo" width="100" height="100">
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center">
                @auth
                    <p class="text-xs font-bold uppercase">Welcome, {{ auth()->user()->name }}!</p>
                    <a
                        href="#"
                        x-data="{}"
                        @click.prevent="document.querySelector('#logout-form').submit()"
                        class="block text-left ml-3 px-4 py-1 text-xs leading-6 hover:bg-blue-700 bg-blue-500 text-white rounded-xl"
                    >Log Out</a>
                    <form id="logout-form" method="POST" action="/logout" class="hidden">
                        @csrf
                    </form>
                @else
                    <a href="/register" class="text-xs font-bold uppercase {{ request()->is('register') ? 'text-blue-500' : '' }}">Register</a>
                    <a href="/login" class="ml-6 text-xs font-bold uppercase {{ request()->is('login') ? 'text-blue-500' : '' }}">Log In</a>
                @endauth
            </div>
        </nav>

        {{ $slot }}

        <x-flash />
    </section>
</body>
