<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\AuthCommunityController;
use App\Http\Controllers\AuthOrganizerController;

Route::get('/', function () {
    return view('landingPage');
});

// ========================================================================================================
//Admin

// #Route form login admin
Route::get('/4dm1n/login', [AuthAdminController::class, 'formLogin'])->name('login');
// #Route form registrasi admin
Route::get('/4dm1n/registrasi', [AuthAdminController::class, 'formRegistrasi']);
// #Route Tambah data registrasi pada admin
Route::post('/4dm1n/registrasi', [AuthAdminController::class, 'registrasi'])->name('actionRegistrasi');
// #route Login admin
Route::post('/4dm1n/login', [AuthAdminController::class, 'login'])->name('actionLogin');

// Authorization Admin
// Logout
Route::delete('/4dm1n/logout', [AuthAdminController::class, 'logout']);
// Dashboard
Route::get('/4dm1n/dashboard', [AuthAdminController::class, 'dashboard']);





// ========================================================================================================
//Community

// #Route form login Community
Route::get('/community/login', [AuthCommunityController::class, 'formLogin']);
// #Route form registrasi Community
Route::get('/community/registrasi', [AuthCommunityController::class, 'formRegistrasi']);
// #Route Tambah data registrasi pada Community
Route::post('/community/registrasi', [AuthCommunityController::class, 'registrasi'])->name('actionRegistrasi');
// #route Login Community
Route::post('/community/login', [AuthCommunityController::class, 'login'])->name('actionLogin');

// Authorization Community
// Logout
Route::delete('/community/logout', [AuthCommunityController::class, 'logout']);
// Dashboard
Route::get('/community/dashboard', [AuthCommunityController::class, 'dashboard']);








// ========================================================================================================
//Community

// #Route form login Community
Route::get('/organizer/login', [AuthOrganizerController::class, 'formLogin']);
// #Route form registrasi Community
Route::get('/organizer/registrasi', [AuthOrganizerController::class, 'formRegistrasi']);
// #Route Tambah data registrasi pada Community
Route::post('/organizer/registrasi', [AuthOrganizerController::class, 'registrasi'])->name('actionRegistrasi');
// #route Login Community
Route::post('/organizer/login', [AuthOrganizerController::class, 'login'])->name('actionLogin');

// Authorization Community
// Logout
Route::delete('/organizer/logout', [AuthOrganizerController::class, 'logout']);
// Dashboard
Route::get('/organizer/dashboard', [AuthOrganizerController::class, 'dashboard']);
