@extends('layouts.app')

@section('tituloPagina')
    Login
@endsection

@section('titulo')
    Inicia sesion en Devstagram
@endsection



@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img class="rounded-lg" src="{{ asset('img/login.jpg') }}" alt="Imagen Registro Usuario">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-lg">

            @if (session('mensaje'))
                <span class="text-xs text-red-500">{{ session('mensaje') }}</span>
            @endif

            <form action="{{ route('login') }}" method="POST" novalidate> @csrf

                <div class="mb-4">
                    <label for="email" class="mb-1 block capitalize text-gray-500 font-bold">
                        Email <span class="font-bold">*</span>
                    </label>
                    <input type="email" name="email" id="email"
                        class="w-full border-2 border-gray-300 p-3 rounded-lg" placeholder="example@example"
                        value="{{ old('email') }}">

                    @error('email')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="mb-1 block capitalize text-gray-500 font-bold">
                        Password <span class="font-bold">*</span>
                    </label>
                    <input type="password" name="password" id="password"
                        class="w-full border-2 border-gray-300 p-3 rounded-lg" placeholder="Password de registro">
                    @error('password')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <input type="checkbox" name="remember" id="remember" class="mx-0">
                    <label class="mx-0 font-semibold text-gray-500" for="remember">
                        Mantener mi sesion abierta
                    </label>

                    @error('password')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer capitalize font-bold w-full text-white p-3 rounded-lg">
                    Entrar
                </button>
            </form>
        </div>
    </div>
@endsection
