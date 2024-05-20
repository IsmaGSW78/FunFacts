@extends('base')

@section('title', 'Modifier une FunFact')

@section('content')
    <h1>Créér une FunFact</h1>
    <form action="" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" name="title" value="{{ old('title', $post->title)}}">
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="slug">Slug</label>
            <input type="text" name="slug" value="{{ old('slug', $post->slug)}}">
            @error('slug')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="content">Contenu</label>
            <textarea name="content">{{ old('content', $post->content) }}</textarea>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
@endsection