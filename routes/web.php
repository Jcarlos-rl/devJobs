<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\VacanteController;


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
    return view('welcome');
});

Auth::routes(['verify' == true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/vacantes', [VacanteController::class, 'index'])->name('vacantes.index');
Route::get('/vacantes/create', [VacanteController::class, 'create'])->name('vacantes.create');
Route::post('/vacantes/imagen', [VacanteController:: class, 'imagen'])->name('vacantes.imagen');
Route::post('/vacantes/borrarimagen', [VacanteController:: class, 'borrarimagen'])->name('vacantes.borrarimagen');
Route::post('/vacantes', [VacanteController::class, 'store'])->name('vacantes.store');




/* ----- ----- ----- Verify Email ----- ----- ----- */
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
