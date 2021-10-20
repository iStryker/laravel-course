<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('posts');
});

/*
Route::get('post', function() {
    return view('post', [
        'post' => file_get_contents(__DIR__ . "")
    ]);
});
*/

Route::get('post/{post}', function($slug) {
    // return $slug;

    //$post = file_get_contents(__DIR__ . "/../resources/posts/{$slug}.html");
    $path = __DIR__ . "/../resources/posts/{$slug}.html";
    
    if(! file_exists($path)) {
        // dd('file does not exist');
        abort(404);
        return redirect('/');
    }

    $post = file_get_contents($path);

    return view('post', [
        'post' => $post
    ]);
});

Route::get('/hello', function() {
    return '<h1>Hello World</h1>';
});

Route::get('/json-example', function() {
    return ['foo' => 'bar'];
});