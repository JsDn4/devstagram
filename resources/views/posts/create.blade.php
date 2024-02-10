@extends('layouts.app')

@section('tituloPagina')
    Crear
@endsection

@section('titulo')
    Crea un nuevo registro
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
    <div class="md:flex md:items-center md:justify-around">
        <div class="md:w-1/2 px-10">

            <form action="{{ route('imagenes.store') }}" id="dropzone" method="POST" enctype="multipart/form-data"
                class="dropzone border-dashed border-2 h-80 rounded flex flex-col justify-center items-center">@csrf
            </form>

        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-lg sm:mt-10">
            <form action="{{ route('posts.store') }}" method="POST" novalidate> @csrf
                <div class="mb-4">

                    <label for="titulo" class="mb-1 block capitalize text-gray-500 font-bold">
                        Titulo <span class="font-bold">*</span>
                    </label>
                    <input type="text" name="titulo" id="titulo"
                        class="w-full border-2 border-gray-300 p-3 rounded-lg" placeholder="Titulo de la publicacion"
                        value="{{ old('titulo') }}">

                    @error('titulo')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror

                </div>

                <div class="mb-4">

                    <label for="descripcion" class="mb-1 block capitalize text-gray-500 font-bold">
                        Descripcion <span class="font-bold">*</span>
                    </label>
                    <textarea placeholder="Descripcion de la publicacion" type="text" name="descripcion" id="descripcion"
                        class="w-full border-2 border-gray-300 p-3 rounded-lg resize-none">
                        {{ old('descripcion') }}
                    </textarea>

                    @error('descripcion')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror

                </div>

                <div class="mb-5">
                    <input type="hidden" name="imagen" id="imagen" value="{{ old('imagen') }}">


                    @error('imagen')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer capitalize font-bold w-full text-white p-3 rounded-lg">
                    Crear publicacion
                </button>
            </form>

        </div>
    </div>
@endsection
