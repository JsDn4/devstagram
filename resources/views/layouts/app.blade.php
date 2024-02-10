<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    @stack('styles')


    @vite('resources/css/app.css')

    <title>DevStagram - @yield('tituloPagina')</title>

    @livewireStyles
</head>

<body>

    {{-- header blur --}}
    <header class="fixed top-0 left-0 w-full h-16 bg-white bg-opacity-50 backdrop-filter backdrop-blur-lg z-10 shadow">
        <div
            class="container mx-auto flex justify-between items-center h-full md:container sm:container lg:container lg:mx-auto lg:w-[80%]">

            @auth

                <a href="{{ route('home') }}" class="text-2xl font-bold">
                    <h1>DevStagram</h1>
                </a>

            @endauth

            @guest
                <a href="{{ route('login') }}" class="text-2xl font-bold">
                    <h1>DevStagram</h1>
                </a>
            @endguest


            @auth

                <nav class="flex items-center gap-4">

                    @auth
                        <a href="{{route('posts.index', Auth::user()->username)}}">Mi perfil</a>
                    @endauth

                    <a class="flex items-center gap-2 bg-white border rounded-md p-2 text-gray-600 capitalize font-bold cursor-pointer"
                        href="{{ route('posts.create') }}">
                        <span>crear</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </a>

                    <form action="{{ route('logout') }}" method="POST">@csrf

                        <button class="text-sm font-semibold" type="submit">
                            Cerrar sesion
                        </button>

                    </form>

                </nav>

            @endauth

            @guest
                <nav class="flex items-center gap-4">
                    <a href="{{ route('login') }}" class="text-sm font-semibold">Login</a>
                    <a href='{{ route('register') }}' class="text-sm font-semibold">Registro</a>
                </nav>
            @endguest
        </div>
    </header>

    {{-- header --}}

    {{-- Main --}}
    <main class="w-[90%] mx-auto mt-20">
        <h3 class="text-center text-2xl font-bold">@yield('titulo')</h3>
        @yield('contenido')
    </main>


    {{-- Main --}}

    {{-- footer --}}

    <footer class="container mx-auto mt-10">

        <p class="text-center font-semibold">
            DevStagram - Todos los derechos reservados &copy; {{ date('Y') }}
        </p>
    </footer>

    {{-- footer --}}


    @vite('resources/js/app.js')

    @livewireScripts
</body>

</html>
