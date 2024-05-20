<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\FunFactFilterRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Str;



class FunFactController extends Controller
{

    public function create()
    {
        return view('funfact.create');
    }

    public function store(CreatePostRequest $request)
    {
        $post = Post::create ($request->validated()); 
        return redirect()->route('funfacts.show', ['slug' => $post->slug, 'post' => $post->id])->with('success', 'La FunFact a bien été créér !');
    }

    public function edit(Post $post)
    {
        return view('funfact.edit', [
            'post' => $post
        ]);
    }

    public function update(Post $post , CreatePostRequest $request)
    {
        $post->update($request->validated());
        return redirect()->route('funfacts.show', ['slug' => $post->slug, 'post' => $post->id])->with('success', 'La FunFact a bien été modifiée !');
    }

    public function index(FunFactFilterRequest $request): View
    {
        return view('funfact.index', [
            'posts' => Post::paginate(1)
        ]);
    }

    public function show(string $slug, Post $post): RedirectResponse | View
    {
        
        if($post->slug !== $slug){
            return to_route('funfacts.show', ['slug' => $post->slug, 'id' => $post->id]);
        }
        
        return view('funfact.show', [
            'post' => $post
        ]);
    }
}
