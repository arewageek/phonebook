<?php

use App\Http\Controllers\Contacts;
use Illuminate\Support\Facades\Route;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/contact/create', [Contacts::class, 'create']);
    Route::post('/contact/delete/{id}', [Contacts::class, 'delete']);
    Route::get('/contact/{id}', [Contacts::class, 'view']);
    Route::post('/contact/{id}/edit', [Contacts::class, 'edit']);
    Route::get('/contacts', [Contacts::class, 'index']);
});
