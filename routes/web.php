<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Route::get('/inscription', function () {
    return view('inscription');
})->name('inscription')->middleware('guest');

Route::get('/connexion', function () {
    return view('connexion');
})->name('connexion')->middleware('guest');

Route::get('/Usershow',['App\Http\Controllers\UserController','show'])->name('user.show')->middleware('auth');


Route::post('/inscription', ['App\Http\Controllers\InscriptionController', 'store'])->name('inscription.submit')->middleware('guest');

Route::post('/connexion', ['App\Http\Controllers\AuthController', 'authenticate'])->name('auth.login')->middleware('guest');

Route::delete('/logout', ['App\Http\Controllers\AuthController', 'logout'])->name('auth.logout')->middleware('auth');

Route::resource('messages', 'App\Http\Controllers\MessageController')->except([
    'edit','update'
])->middleware('auth');

Route::post('/messages/{message}/like', ['App\Http\Controllers\MessageController', 'like'])->name('messages.like')->middleware('auth');

Route::post('/messages/{message}/report', ['App\Http\Controllers\MessageController', 'report'])->name('messages.report')->middleware('auth');

Route::get('/messages/{message}/comment', ['App\Http\Controllers\CommentController', 'create'])->name('comments.create')->middleware('auth');

Route::post('/messages/{message}/comment', ['App\Http\Controllers\CommentController', 'store'])->name('comments.store')->middleware('auth');

Route::resource('communities', 'App\Http\Controllers\CommunityController')->except([
    'edit','update','delete'
])->middleware('auth')->middleware(App\Http\Middleware\CheckCommunityMembership::class);

Route::get('/communities/{community}/messages/create', ['App\Http\Controllers\MessageController', 'createForCommunity'])->name('messages.community.create')->middleware('auth');

Route::post('/communities/{community}/store', ['App\Http\Controllers\MessageController', 'storeForCommunity'])->name('messages.community.store')->middleware('auth');

Route::get('/communities/{community}/adhesion', ['App\Http\Controllers\CommunityController', 'adhesion'])->name('communities.adhesion')->middleware('auth');

Route::get('/communities/{community}/adhesionsent', ['App\Http\Controllers\CommunityController', 'adhesionSent'])->name('communities.adhesionsent')->middleware('auth');

Route::post('/communities/{community}/joinrequest', ['App\Http\Controllers\CommunityController', 'joinRequest'])->name('communities.joinrequest')->middleware('auth');

Route::get('/communities/{community}/manage', ['App\Http\Controllers\CommunityController', 'manage'])->name('communities.demandes.index')->middleware('auth');

Route::post('/communities/{community}/manage/{demande}/accept', ['App\Http\Controllers\CommunityController', 'acceptDemande'])->name('communities.demandes.accept')->middleware('auth');

Route::delete('/communities/{community}/manage/{demande}/refuse', ['App\Http\Controllers\CommunityController', 'refuseDemande'])->name('communities.demandes.refuse')->middleware('auth');