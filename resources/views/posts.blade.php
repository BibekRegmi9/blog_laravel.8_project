<x-layout xmlns:a="http://www.w3.org/1999/html">
    @foreach($posts as $post)
        <article>
            <h1>
                <a href="/posts/{{$post->slug}}">
                    {!! $post->title !!}
                </a>

            </h1>
            <p>
            <a href="/categories/{{ $post->category->slug }}"> {{$post->category->name}} </a>
            </p>
            <div>
                {{$post->excerpt}}
            </div>
        </article>
    @endforeach
</x-layout>
