<x-layout>
    @foreach($posts as $post)
        <article>
            <h1>
                <a href="/posts/{{$post->slug}}"></a>
                {{$post->title}}
            </h1>
            <div>
                {{$post->excerpt}}
            </div>
        </article>
    @endforeach
</x-layout>
