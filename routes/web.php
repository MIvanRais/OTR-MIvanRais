<?php

use App\Http\Controllers\AmeLicenseController;
use App\Http\Controllers\BasicLicenseController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PtwController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\UserController;

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
    return view('index');
})->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    
    Route::post('/logout', [LoginController::class, 'logout']);
    
    Route::get('/password/edit', [PasswordController::class, 'showChangePassword']);
    Route::post('/password/edit', [PasswordController::class, 'updatePassword'])->name('password.update');

    Route::resource('training', TrainingController::class)->except('show')->middleware('user');
    Route::resource('basic-license', BasicLicenseController::class)->except('show')->middleware('user');
    Route::resource('ame-license', AmeLicenseController::class)->except('show')->middleware('user');
    Route::resource('ptw', PtwController::class)->except('show')->middleware('user');
    Route::put('ptw/{id}/send', [PtwController::class, 'send'])->middleware('user')->name('ptw.send');
    
    Route::put('ptw/{id}/verificationok', [PtwController::class, 'verificationok'])->middleware('user')->name('ptw.verificationok');
    Route::put('ptw/{id}/verificationreject', [PtwController::class, 'verificationreject'])->middleware('user')->name('ptw.verificationreject');

    Route::get('ptw/{id}/assessment', [PtwController::class, 'assessment'])->middleware('user')->name('ptw.assessment');
    Route::post('ptw/{id}/assessment', [PtwController::class, 'evaluate'])->middleware('user')->name('ptw.evaluate');

    Route::resource('user', UserController::class)->middleware('admin');
    
    // Route::get('/generate-ptw', [PdfController::class, 'generatePdf']);
});