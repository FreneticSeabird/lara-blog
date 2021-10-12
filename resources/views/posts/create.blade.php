@extends('layout')

@section('title', 'Créer un nouvel article')

@section('content')
    <h1>Créer un nouvel article</h1>
    
    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" id="title" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="content">Article</label>
            <textarea name="content" id="content" class="form-control" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="categories">Catégories</label>
            <select multiple name="categories[]" id="categories" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-3">
            <button class="btn btn-primary">Ajouter</button>
        </div>
    </form>
@endsection