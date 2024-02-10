@if ($posts->count())

<div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    @foreach ($posts as $post)
        <div>
            <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user]) }}">
                <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen post - {{ $post->titulo }}">
            </a>
        </div>
    @endforeach
</div>

<div class="mt-10">
    {{ $posts->links('pagination::tailwind') }}
</div>


@else
   <p class="text-center font-bold text-2xl text-gray-500 p-5">Uppss! Aun no hay publicaciones disponibles</p>
@endif
