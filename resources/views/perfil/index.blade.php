<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@extends('layouts.app')

@section('tituloPagina')
    Editar perfil
@endsection

@section('titulo')
    Editar Perfil: {{ auth()->user()->username }}
@endsection

@section('contenido')

<div class="md:flex md:justify-center">
    <div class="md:w-1/2 bg-white shadow p-6">

        <form action="{{route('perfil.store')}}" method="POST" class="mt-10 md:mt-0" enctype="multipart/form-data">@csrf

            <div class="mb-4">

                <label for="username" class="mb-1 block capitalize text-gray-500 font-bold">
                    Username <span class="font-bold">*</span>
                </label>
                <input type="text" name="username" id="username"
                    class="w-full border-2 border-gray-300 p-3 rounded-lg" placeholder="Nombre de usuario"
                    value="{{ Auth::user()->username }}">

                @error('username')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror

            </div>

            <div class="mb-4">

                <label for="imagen" class="mb-1 block capitalize text-gray-500 font-bold">
                    Imagen Perfil <span class="font-bold">*</span>
                </label>
                <input type="file" name="imagen" id="imagen" accept=".jpg, .png, .jpge"
                    class="w-full border-2 border-gray-300 p-3 rounded-lg"

                >

            </div>

            {{-- <div class="mb-4">

                <label for="email" class="mb-1 block capitalize text-gray-500 font-bold">
                    email <span class="font-bold">*</span>
                </label>
                <input type="text" name="email" id="email"
                    class="w-full border-2 border-gray-300 p-3 rounded-lg" placeholder="Nombre de usuario"
                    value="{{ Auth::user()->email }}">

                @error('email')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror

            </div>

            <div class="mb-4">
                <label for="password" class="mb-1 block capitalize text-gray-500 font-bold">
                    Password
                </label>
                <input type="password" name="password" id="password"
                    class="w-full border-2 border-gray-300 p-3 rounded-lg" placeholder="Cambiar password">

                @error('password')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="mb-1 block capitalize text-gray-500 font-bold">
                    Repite tu password
                </label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="w-full border-2 border-gray-300 p-3 rounded-lg" placeholder="Repite tu password">
            </div> --}}



            <button type="submit"
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer capitalize font-bold w-full text-white p-3 rounded-lg">
                Guardar cambios
            </button>
        </form>

    </div>
</div>

@endsection
