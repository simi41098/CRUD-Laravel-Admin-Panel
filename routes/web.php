<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

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
    return view('auth.login');
});

Route::resource('companies', CompanyController::class);
Route::resource('employees', EmployeeController::class);

Route::get('/dashboard', [CompanyController::class, 'index'] )->middleware(['auth'])->name('dashboard');

Route::get('/create', [CompanyController::class,'create'])->name('create');
Route::get('/edit', [CompanyController::class,'edit'])->name('edit');
Route::post('/store', [CompanyController::class,'store'])->name('store');
Route::post('/update', [CompanyController::class,'update'])->name('update');
// Route::post('/employees', [EmployeeController::class, 'index']);

require __DIR__.'/auth.php';
