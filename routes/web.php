<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AppointmentController;
use App\Http\Controllers\Backend\BlogController;
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

Route::controller(HomeController::class)->group(function(){
  Route::get('/', 'index');
  Route::get('/doctors', 'doctor')->name('doctor');
  Route::get('/about-us', 'about')->name('about');
  Route::get('/contact-us', 'contact')->name('contact');
  Route::post('/contactStore', 'contactStore')->name('contactStore');
  Route::get('/blogs', 'blogs')->name('blog');
});




Route::middleware(['auth'])->group(function () {
  Route::get('/home', [HomeController::class, 'home'])->name('home');

  Route::controller(AppointmentController::class)->name('appointment.')->group(
    function () {
      Route::middleware(['admin'])->group(
        function () {
          Route::get('appointment/', 'index')->name('index');
          Route::get('appointment/create', 'create')->name('create');
          Route::post('appointment/store', 'store')->name('store');
          Route::get('appointment/edit/{appointment}', 'edit')->name('edit');
          Route::post('appointment/update/{appointment}', 'update')->name('update');
          Route::delete('appointment/destroy/{appointment}', 'destroy')->name('delete');
        }
      );


      Route::get('/myappointment', 'myappointment')->name('myappointment');
      Route::get('/cancel_appointment/{id}', 'cancel_appointment')->name('cancel');
      Route::get('/delete_appointment/{id}', 'delete_appointment')->name('delete');
      Route::get('/approve_appointment/{id}', 'approve_appointment')->name('approve');
    }
  );

  Route::controller(DoctorController::class)->name('backend.doctor.')->group(
    function () {
      Route::middleware(['admin'])->group(
        function () {
          Route::get('doctor/', 'index')->name('index');
          Route::get('doctor/create', 'create')->name('create');
          Route::post('doctor/store', 'store')->name('store');
          Route::get('doctor/edit/{doctor}', 'edit')->name('edit');
          Route::post('doctor/update/{doctor}', 'update')->name('update');
          Route::get('doctor/destroy/{doctor}', 'destroy')->name('trash');
          Route::get('doctor/status/{doctor}', 'status')->name('status');
          Route::get('doctor/reStore/{id}', 'reStore')->name('reStore');
          Route::get('doctor/delete/{id}', 'delete')->name('delete');
        }
      );
    }
  );
  Route::controller(BlogController::class)->name('backend.blog.')->group(
    function () {
      Route::middleware(['admin'])->group(
        function () {
          Route::get('blog/', 'index')->name('index');
          Route::get('blog/create', 'create')->name('create');
          Route::post('blog/store', 'store')->name('store');
          Route::get('blog/edit/{blog}', 'edit')->name('edit');
          Route::post('blog/update/{blog}', 'update')->name('update');
          Route::get('blog/destroy/{blog}', 'destroy')->name('trash');
          Route::get('blog/status/{blog}', 'status')->name('status');
          Route::get('blog/reStore/{id}', 'reStore')->name('reStore');
          Route::get('blog/delete/{id}', 'delete')->name('delete');
        }
      );
    }
  );
});







Auth::routes();
