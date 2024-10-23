<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SpecializationController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\RatingsController;
use App\Http\Controllers\PreviewsController;
use App\Http\Controllers\MedicalConditionsController;

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
    return view('auth.login');
});


Auth::routes();
Route::middleware(['auth'])->group(function(){
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('index/specilization',[SpecializationController::class,'index'])->name('index_specilization');
Route::get('destore/specilization/{id}',[SpecializationController::class,'destore'])->name('delate_specilization');
Route::get('create/specilization',[SpecializationController::class,'create'])->name('create_specilization');
Route::post('store/specilization',[SpecializationController::class,'store'])->name('store_specilization');
Route::post('edit/specilization/{id}',[SpecializationController::class,'edit'])->name('edit_specilization');
Route::get('update/specilization/{id}',[SpecializationController::class,'update'])->name('update_specilization');

Route::get('index/doctor',[DoctorsController::class,'index'])->name('index_doctor');
Route::get('create/doctor',[DoctorsController::class,'create'])->name('create_doctor');
Route::post('store/doctor',[DoctorsController::class,'store'])->name('store_doctor');
Route::get('update/doctor/{id}',[DoctorsController::class,'update'])->name('update_doctor');
Route::post('edit/doctor/{id}',[DoctorsController::class,'edit'])->name('edit_doctor');
Route::get('destore/doctor/{id}',[DoctorsController::class,'destore'])->name('destore_doctor');

Route::get('index/Patient',[PatientsController::class,'index'])->name('index_Patient');
Route::get('create/Patient',[PatientsController::class,'create'])->name('create_Patient');
Route::post('store/Patient',[PatientsController::class,'store'])->name('store_Patient');
Route::get('update/Patient/{id}',[PatientsController::class,'update'])->name('update_Patient');
Route::post('edit/Patient/{id}',[PatientsController::class,'edit'])->name('edit_Patient');
Route::get('destore/Patient/{id}',[PatientsController::class,'destore'])->name('destore_Patient');

Route::get('index/rating',[RatingsController::class,'index'])->name('index_rating');
Route::get('create/rating',[RatingsController::class,'create'])->name('create_rating');
Route::post('store/rating',[RatingsController::class,'store'])->name('store_rating');
Route::get('update/rating/{id}',[RatingsController::class,'update'])->name('update_rating');
Route::post('edit/rating/{id}',[RatingsController::class,'edit'])->name('edit_rating');
Route::get('destore/rating/{id}',[RatingsController::class,'destore'])->name('destore_rating');

Route::get('index/preview',[PreviewsController::class,'index'])->name('index_preview');
Route::get('create/preview',[PreviewsController::class,'create'])->name('create_preview');
Route::post('store/preview',[PreviewsController::class,'store'])->name('store_preview');
Route::get('update/preview/{id}',[PreviewsController::class,'update'])->name('update_preview');
Route::post('edit/preview/{id}',[PreviewsController::class,'edit'])->name('edit_preview');
Route::get('destore/preview/{id}',[PreviewsController::class,'destore'])->name('destore_preview');

Route::get('index/condition',[MedicalConditionsController::class,'index'])->name('index_condition');
Route::get('create/condition',[MedicalConditionsController::class,'create'])->name('create_condition');
Route::post('store/condition',[MedicalConditionsController::class,'store'])->name('store_condition');
Route::get('update/condition/{id}',[MedicalConditionsController::class,'update'])->name('update_condition');
Route::post('edit/condition/{id}',[MedicalConditionsController::class,'edit'])->name('edit_condition');
Route::get('destore/condition/{id}',[MedicalConditionsController::class,'destore'])->name('destore_condition');});









