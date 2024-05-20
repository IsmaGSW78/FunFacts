<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\FunFactController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/funfacts') -> name ('funfacts.') -> controller(FunFactController::class)->group(function() {
    Route::get('/','index') -> name('index');
    Route::get('/new', 'create') -> name('create');
    Route::post('/new', 'store') -> name('store');
    Route::get('/{post}/edit', 'edit') -> name('edit');
    Route::post('/{post}/edit', 'update') -> name('update');
    Route::get('/{slug}-{post}', 'show') -> where([
        'slug' => '[a-z\-]+',
        'post' => '[0-9]+'
    ]) -> name('show');
    
});

