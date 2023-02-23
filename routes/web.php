<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\DoctorController;

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

/* Route::get('/', function(){
  return view('frontend.index');
}); */
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'redirect'])->name('home');

Route::controller(DoctorController::class)->name('backend.doctor.')->group(function(){
  Route::get('doctor/','index')->name('index');
  Route::get('doctor/create', 'create')->name('create');
  Route::post('doctor/store', 'store')->name('store');
  Route::get('doctor/edit/{doctor}', 'edit')->name('edit');
  Route::post('doctor/update/{doctor}', 'update')->name('update');
  Route::delete('doctor/destroy/{doctor}','destroy')->name('delete');

});

Auth::routes();
