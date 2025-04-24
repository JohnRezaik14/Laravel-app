@vite(['resources/css/app.css', 'resources/js/app.js'])
<header class="w-full  text-sm mb-6 not-has-[nav]:hidden">
    @if (Route::has('login'))
        <nav
            class="flex items-center justify-end gap-4 w-full bg-gradient-to-r from-blue-500 to-purple-500 p-4 rounded-lg shadow-md">
            @auth
                <a href="{{ url('/dashboard') }}"
                    class="transition-all duration-300 px-6 py-2 bg-white text-blue-600 hover:bg-blue-100 rounded-full font-semibold shadow-sm hover:shadow-lg">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}"
                    class="transition-all duration-300 px-6 py-2 text-white hover:bg-white/20 rounded-full font-semibold">
                    Log in
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="transition-all duration-300 px-6 py-2 bg-white text-blue-600 hover:bg-blue-100 rounded-full font-semibold shadow-sm hover:shadow-lg">
                        Register
                    </a>
                @endif
            @endauth
        </nav>
    @endif
</header>
