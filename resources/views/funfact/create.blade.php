@extends('base')

@section('title', 'Créér une FunFact')

@section('content')
    <h1>Créér une FunFact</h1>
    <form action="" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" name="title" value="{{ old('title','Mon titre')}}">
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="slug">Slug</label>
            <input type="text" name="slug" value="{{ old('slug', 'mon-slug')}}">
            @error('slug')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="content">Contenu</label>
            <textarea name="content">{{ old('content', 'Contenu de démonstration')}}</textarea>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Créér</button>
    </form>
@endsection