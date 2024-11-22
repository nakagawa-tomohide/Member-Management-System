<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MemberController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [MemberController::class, 'register'])->name('register');
Route::post('/memberRegister', [MemberController::class, 'memberRegister'])->name('memberRegister');
Route::get('/top', [MemberController::class, 'top'])->name('top');
Route::get('/edit/{id}', [MemberController::class, 'edit'])->name('edit');
Route::post('/memberEdit/{id}', [MemberController::class, 'memberEdit'])->name('memberEdit');
Route::delete('/memberDelete/{id}', [MemberController::class, 'memberDelete'])->name('memberDelete');
Route::get('/search', [MemberController::class, 'search'])->name('search');