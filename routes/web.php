<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('threads.index');
});

Route::get('/threads/{thread}', function ($id) {
	$result = \App\Thread::findOrFail($id);
	return view('threads.view', compact('result'));
});

Route::get('/locale/{locale}', function ($locale) {
	session(['locale' => $locale]); // Cria uma session
	return back();
});

Route::middleware('auth')->group(function () {
	Route::resource('threads', 'ThreadController')->except(['create', 'edit', 'show']);
	Route::get('/threads/{thread}/edit', function (\App\Thread $thread) {
		return view('threads.edit', compact('thread'));
	});
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
