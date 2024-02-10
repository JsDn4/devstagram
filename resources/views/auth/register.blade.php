@extends('layouts.app')

@section('tituloPagina')
    Registro
@endsection

@section('titulo')
    Registro
@endsection



@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img class="rounded-lg" src="{{ asset('img/registrar.jpg') }}" alt="Imagen Registro Usuario">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-lg">
            <form action="{{ route('register') }}" method="POST" novalidate> @csrf
                <div class="mb-4">

                    <label for="name" class="mb-1 block capitalize text-gray-500 font-bold">
                        Nombre <span class="font-bold">*</span>
                    </label>
                    <input type="text" name="name" id="name"
                        class="w-full border-2 border-gray-300 p-3 rounded-lg" placeholder="Nombre"
                        value="{{ old('name') }}">

                    @error('name')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror

                </div>

                <div class="mb-4">

                    <label for="usename" class="mb-1 block capitalize text-gray-500 font-bold">
                        Nombre de usuario <span class="font-bold">*</span>
                    </label>
                    <input type="text" name="username" id="username"
                        class="w-full border-2 border-gray-300 p-3 rounded-lg" placeholder="Tu nombre de usuario"
                        value="{{ old('username') }}">

                    @error('username')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror

                </div>

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
                    <label for="password_confirmation" class="mb-1 block capitalize text-gray-500 font-bold">
                        Repite tu password <span class="font-bold">*</span>
                    </label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="w-full border-2 border-gray-300 p-3 rounded-lg" placeholder="Repite tu password">
                </div>

                <button type="submit"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer capitalize font-bold w-full text-white p-3 rounded-lg">
                    Registrar
                </button>
            </form>
        </div>
    </div>
@endsection
