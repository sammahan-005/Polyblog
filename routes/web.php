<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Route::get('/inscription', function () {
    return view('inscription');
})->name('inscription')->middleware('guest');

Route::get('/connexion', function () {
    return view('connexion');
})->name('connexion')->middleware('guest');
Route::post('/inscription', ['App\Http\Controllers\InscriptionController', 'store'])->name('inscription.submit')->middleware('guest');

Route::post('/connexion', ['App\Http\Controllers\AuthController', 'authenticate'])->name('auth.login')->middleware('guest');

Route::delete('/logout', ['App\Http\Controllers\AuthController', 'logout'])->name('auth.logout')->middleware('auth');

Route::resource('messages', 'App\Http\Controllers\MessageController')->except([
    'edit', 'destroy','update'
])->middleware('auth');

Route::post('/messages/{message}/like', ['App\Http\Controllers\MessageController', 'like'])->name('messages.like')->middleware('auth');

Route::post('/messages/{message}/report', ['App\Http\Controllers\MessageController', 'report'])->name('messages.report')->middleware('auth');

Route::get('/messages/{message}/comment', ['App\Http\Controllers\CommentController', 'create'])->name('comments.create')->middleware('auth');

Route::post('/messages/{message}/comment', ['App\Http\Controllers\CommentController', 'store'])->name('comments.store')->middleware('auth');