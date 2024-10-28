<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouterController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeController;
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



Route::resource('companies', CompaniesController::class);
Route::resource('employees', EmployeController::class);