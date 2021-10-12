@extends('layout')

@section('title', $post->title)

@section('content')
    <article>
        <header>
            <h1>{{ $post->title }}</h1>
            <small>Rédigé par {{ $post->user->name }} le {{ $post->created_at->format('d/m/Y H:i') }}</small>
        </header>
        <aside>
            <ul>
                <h2 class="h5">Liste des catégories</h2>
                @foreach($categories as $category)
                    <li>{{ $category->name }}</li>
                @endforeach
            </ul>
        </aside>
        {!! nl2br(e($post->content)) !!}
    </article>
    
    <section>
        <h2>Espace commentaires</h2>
        
        <form action="{{ route('comments.store', ['id' => $post->id]) }}" method="post" class="mb-3">
            @csrf
            
            @if($errors->any())
                <aside class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </aside>
            @endif
            
            <fieldset>
                <legend>Ajouter un commentaire</legend>
                <div class="form-group">
                    <label for="nickname">Pseudo</label>
                    <input type="text" value="{{ old('nickname') }}" name="nickname" id="nickname" class="form-control">
                </div>
                <div class="form-group">
                    <label for="content">Contenu</label>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ old('content') }}</textarea>
                </div>
            </fieldset>
            
            <div class="mt-3">
                <button class="btn btn-primary">Ajouter</button>
            </div>
        </form>
        
        <ul>
            @foreach($comments as $comment)
                <li>
                    <article class="py-2">
                        <header class="mb-2 border-bottom">
                            <small>Rédigé par {{ $comment->nickname }} le {{ $comment->created_at->format('d/m/Y H:i') }}</small>
                        </header>
                        {!! nl2br(e($comment->content)) !!}
                    </article>
                </li>
            @endforeach
        </ul>
    </section>
@endsection