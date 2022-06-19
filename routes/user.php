<?php

use App\Http\Controllers\User\CarrierController;
use App\Http\Controllers\User\CustomerController;
use App\Http\Controllers\User\DeclarantController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\RegistrationController;
Route::prefix('/{lang}')->group(function () {

    Route::get('/', function () {return view('user.home.index');})->name('home');
    Route::get('/test', function () {return view('test');})->name('test');
    Route::get('/input-function',[RegistrationController::class,'carrierCarInputs'])->name('input-function');
    Route::get('/profile', function () {return view('user.profile.index', ['user'=> Auth::user()]);})->name('profile');

            // Truck
    Route::get('/truckers',[CarrierController::class, 'truckers'])->name('truckers');
    Route::post('/addCarrier',[CarrierController::class,'addCarrier'])->name('addCarrier');
    Route::get('/truckers-active',function (){return view('user.truckers.truckers-active.index');})->name('truckers-active');
    Route::get('/count-carriers-post',[CarrierController::class,'countCarriersPost'])->name('count-carriers-post');

             // Declarant
    Route::get('/declarants',[DeclarantController::class,'declarants'])->name('declarants');
    Route::post('/addDeclarant',[DeclarantController::class,'addDeclarant'])->name('addDeclarant');
    Route::get('/declarants-active',function (){return view('user.declarants-active.index');})->name('declarants-active');
    Route::get('/count-declarants',[DeclarantController::class,'countDeclarants'])->name('count-declarants');

            // Customer
    Route::get('/customers',[CustomerController::class,'customers'])->name('customers');
    Route::post('/addCustomer',[CustomerController::class,'addCustomer'])->name('addCustomer');
    Route::get('/count-customers-post',[CustomerController::class,'countCustomersPost'])->name('count-customers-post');

          //Register
    Route::get('/register',function (){return view('user.register.sign-up.index');})->name('register');
    Route::post('/register',[RegistrationController::class,'register'])->name('user-register');
    Route::get('/login',function (){return view('user.register.sign-in.index');})->name('user-login');
    Route::post('/login',[RegistrationController::class,'login'])->name('user-login');
    Route::get('/logout', [RegistrationController::class,'logout'])->name('user-logout');


});
