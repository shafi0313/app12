<?php

use App\Http\Controllers\Admin\MyProfileController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::resource('users', UserController::class)->except(['create', 'show']);
Route::patch('users/{user}/active-status', [UserController::class, 'activeStatus'])->name('users.active_status');

Route::controller(MyProfileController::class)->prefix('my-profiles')->name('my_profiles.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('store');
    Route::post('/session-logout', 'sessionLogout')->name('session_logout');
    Route::post('/all-session-logout', 'allSessionLogout')->name('all_session_logout');
});
