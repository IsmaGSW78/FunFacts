@extends('base')

@section('title', 'Accueil FunFact')

@section('content')
    <h1>Ma FunFact</h1>
    <p>Voici une FunFact aléatoire :</p>
    
    @foreach ($posts as $post)
        <article>
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
            <p>
                <a href="{{ route('funfacts.show', ['post' => $post->id, 'slug' => $post->slug]) }}" class="btn btn-primary">Lire la suite</a>
        </article>
    @endforeach
     
    {{ $posts->links() }}
@endsection