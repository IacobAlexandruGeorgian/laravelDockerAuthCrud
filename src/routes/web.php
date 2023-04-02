<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProjectController;

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
    return redirect('companies');
});

Route::controller(AuthController::class)->group(function() {

    Route::get('login', 'index')->name('login');
    Route::get('register', 'register')->name('register');
    Route::get('logout', 'logout')->name('logout');

    Route::post('validate_registration', 'validate_registration')->name('validate_registration');
    Route::post('valid', 'valid')->name('valid');
});

Route::get('companies', [CompanyController::class, 'index'])->name('companies.index');
Route::get('companies/{id}/projects', [ProjectController::class, 'index'])->name('projects.index');

Route::group(['middleware' => 'auth'], function () {

    Route::resource('companies', CompanyController::class, ['except' => ['index']]);
    Route::resource('companies/{id}/projects', ProjectController::class, ['except' => ['index']]);
});