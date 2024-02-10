<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@extends('layouts.app')

@section('tituloPagina')
    Post
@endsection

@section('titulo')
    {{ $post->titulo }}
@endsection

@section('contenido')

    <div class="w-[90%] mx-auto md:flex">
        <div class="md:w-1/2">

            <img class="w-80" src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen - {{ $post->titulo }}">
                @auth
                <livewire:like-post :post="$post">


                    {{-- @if ($post->checkLikes(Auth::user()))
                        <form action="{{ route('posts.likes.destroy', $post) }}" method="POST">@csrf @method('DELETE')

                            <div class="my-4">

                            </div>
                        </form>
                    @else
                        <form action="{{ route('posts.likes.store', $post) }}" method="POST">@csrf

                            <div class="my-4">
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    @endif --}}
                @endauth
            <div>
                <p class="font-bold">{{ $post->user->username }}</p>
                <p class="text-sm">{{ $post->created_at->diffForHumans() }}</p>

                <p>{{ $post->descripcion }}</p>
            </div>


            @auth
                @if ($post->user_id === auth()->user()->id)
                    <form method="POST" action="{{ route('posts.destroy', $post) }}">@csrf @method('DELETE')
                        <button class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-2" type="submit">
                            Eliminar publicacion
                        </button>
                    </form>
                @endif

            @endauth
        </div>
        <div class="md:w-1/2 p-5">
            <div class="shadow-md bg-white p-4 mb-5">
                @auth
                    <p class="text-xl font-bold text-center mb-4 capitalize">Agrega un nuevo comentario</p>

                    @if (session('mensaje'))
                        <div class="bg-green-500 p-2 rounded-sm mb-6 text-white text-center capitalize font-bold">
                            {{ session('mensaje') }}
                        </div>
                    @endif

                    <form action="{{ route('comentarios.store', ['user' => $user, 'post' => $post]) }}" method="POST"> @csrf
                        <div class="mb-4">

                            <label for="comentario" class="mb-1 block capitalize text-gray-500 font-bold">
                                Agrega un comentario <span class="font-bold">*</span>
                            </label>
                            <textarea placeholder="Comentario de la publicacion" type="text" name="comentario" id="comentario"
                                class="w-full border-2 border-gray-300 p-3 rounded-lg resize-none">
                        </textarea>

                            @error('comentario')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror

                        </div>

                        <button type="submit"
                            class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer capitalize font-bold w-full text-white p-3 rounded-lg">
                            Comentar
                        </button>
                    </form>
                @endauth


                <section class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">

                    @if ($post->comentarios->count())
                        @foreach ($post->comentarios as $comentario)
                            <article class="p-5 border-gray-300 border-b">

                                <a class="font-bold" href="{{ route('posts.index', $comentario->user) }}">
                                    {{ $comentario->user->username }}
                                </a>
                                <p>{{ $comentario->comentario }}</p>
                                <p class="text-sm">{{ $comentario->created_at->diffForHumans() }}</p>

                            </article>
                        @endforeach
                    @else
                        <p class="p-10 text-center">No hay comentarios aun</p>
                    @endif




                </section>

            </div>
        </div>

    </div>
@endsection
