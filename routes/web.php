<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('threads.index');
});

Route::get('/threads/{id}', function ($id) {
	$result = \App\Thread::findOrFail($id);
	return view('threads.view', compact('result'));
});

Route::get('/locale/{locale}', function ($locale) {
	session(['locale' => $locale]); // Cria uma session
	return back();
});
