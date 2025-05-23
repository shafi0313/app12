<?php

use App\Http\Controllers\LockScreenController;
use App\Http\Controllers\SummerNoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/summernote/image/destroy', [SummerNoteController::class, 'imageDestroy'])->name('summernote_image.destroy');

Route::controller(LockScreenController::class)->prefix('/lock-screen')->name('lock_screen.')->group(function () {
    Route::get('/lock', 'lock')->name('lock');
    Route::get('/', 'show')->name('show');
    Route::post('/', 'unlock')->name('unlock');
});
