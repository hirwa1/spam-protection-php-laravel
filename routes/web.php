<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\SpamController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [  'canLogin' => Route::has('login'),  'canRegister' => Route::has('register'),
    ]);
});

Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'),'verified',])->group(function () {

    Route::get('/dashboard', function () {    return Inertia::render('Dashboard'); })->name('dashboard');

     //Spam Report Controller
     Route::controller(SpamController::class)->group(function () {
        Route::get('/spam', 'index')->name('spam');
        Route::get('/spam/new', 'new')->name('new');
        Route::post('/spam', 'create')->name('create');
        Route::put('/spam/{api}', 'update')->name('update');
     });

});
