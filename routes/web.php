<?php

use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

// index.blade.php Display a listing of the resource.
Route::get('/', [PostsController::class, 'index'])->name('posts.index');

// create.blade.php Show the form for creating a new resource.
Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create');

//  Store a newly created resource in storage.
Route::post('/posts/{id}', [PostsController::class, 'store'])->name('posts.store');

// show.blade.php Display the specified resource.
Route::get('/posts/{id}', [PostsController::class, 'show'])->name('posts.show');

// edit.blade.php Show the form for editing the specified resource.
Route::get('/posts/edit/{id}', [PostsController::class, 'edit'])->name('posts.edit');

// Update the specified resource in storage.
Route::put('/posts/{id}', [PostsController::class, 'update'])->name('posts.update');

// Remove the specified resource from storage.
Route::delete('/posts/{id}', [PostsController::class, 'destroy'])->name('posts.destory');

//! error 404 fallback route
Route::fallback(function () {
    return view('NotFound');
});
