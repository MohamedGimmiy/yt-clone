<?php

use App\Http\Livewire\Video\AllVideo;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Video\EditVideo;
use App\Http\Livewire\Video\WatchVideo;
use App\Http\Livewire\Video\CreateVideo;
use App\Http\Controllers\ChannelController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/test', function () {
    return view('test');
});

Route::middleware('auth')->group(function(){
    Route::get('/channel/{channel}/edit',[ChannelController::class, 'edit'])->name('channel.edit');
});


Route::middleware('auth')->group(function(){
    Route::get('/videos/{channel}/create', CreateVideo::class)->name('video.create');
    Route::get('/videos/{channel}/{video}/edit', EditVideo::class)->name('video.edit');
    Route::get('/videoes/{channel}', AllVideo::class)->name('video.all');
});


Route::get('/watch/{video}', WatchVideo::class)->name('video.watch');
