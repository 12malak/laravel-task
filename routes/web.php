<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouterController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [RouterController::class, 'index']);
// Route::get('/companies', [RouterController::class, 'companies'])->name('companies');
// Route::get('/employees', [RouterController::class, 'employees'])->name('employees');



Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::resource('companies', CompaniesController::class);
    Route::resource('employees', EmployeController::class);
    Route::resource('home', HomeController::class);
});

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


// Route::resource('companies', CompaniesController::class);
// Route::resource('employees', EmployeController::class);