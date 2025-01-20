<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(UserController::class)->group(function(){
    Route::get('/', 'showUsers')->name('home');
Route::get('/user/{id}', 'singleUser')->name('view.user');
Route::post('/add', 'addUser')->name('addUser');
Route::post('/update/{id}', 'updateUser')->name('update.user');
Route::get('/updatepage/{id}', 'updatePage')->name('update.page');
Route::get('/delete/{id}', 'deleteUser')->name('delete.user');
Route::get('/deleteall', 'deleteAll')->name('delete.all');
Route::view('newuser','/adduser');
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
