<?php

use App\Http\Controllers\PostcardController;
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

Route::controller(PostcardController::class)->group(function () {

    Route::get('/', 'index')->name('postcards.index');  
    
    // Store Postcard Data
    Route::get('/postcards/create', [PostcardController::class, 'create'])
                ->name('postcards.create');
  
    Route::post('/postcards', [PostcardController::class, 'store'])->middleware('auth');

    // Show Edit Form
    Route::get('/postcards/{postcard}/edit', [PostcardController::class, 'edit'])->middleware('auth');

    // Update Postcard
    Route::put('/postcards/{postcard}', [PostcardController::class, 'update'])->middleware('auth');

    // Delete Postcard
    Route::delete('/postcards/{postcard}', [PostcardController::class, 'destroy'])->middleware('auth');

    // Manage Postcards
    Route::get('/postcards/manage', [PostcardController::class, 'manage'])->name('postcards.manage')->middleware('auth');

    //410 Error Page 
    Route::get('/errors/410', [PostcardController::class, '410'])->name('errors.410');

    // Single Postcard   
    Route::get('/postcards/{postcard}', 'show')->name('postcards.show');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');    
});
