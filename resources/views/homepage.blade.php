@extends('layout')

@section('title', 'Accueil')

@section('content')
    <h1>Accueil du site</h1>
    
    {{ $posts->links() }}
    
    <ul class="list-unstyled">
        @foreach($posts as $post)
            <li>
                <article>
                    <header>
                        <h2><a href="{{ route('posts.show', ['slug' => $post->slug]) }}">{{ $post->title }}</a></h2>
                        <small>Rédigé par {{ $post->user->name }} le {{ $post->created_at }}</small>
                    </header>
                    {{ $post->content }}
                </article>
            </li>
        @endforeach
    </ul>
@endsection