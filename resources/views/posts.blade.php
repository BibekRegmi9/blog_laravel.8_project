@extends('layout')

@section('content')
    @foreach($posts as $post)
        <article>
            <h1>
                <a href="/posts/{{$post->slug}}"></a>
                {{$post->title}}
            </h1>
            <div>
                {{$post->excerptf}}
            </div>
        </article>
    @endforeach
@endsection
