<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthCommunityController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\AuthOrganizerController;
use App\Http\Controllers\OrganizerController;

Route::get('/', function () {
    return view('landingPage');
});
Route::get('/accountLogin', function () {
    return view('accountLogin');
});
Route::get('/accountRegister', function () {
    return view('accountRegister');
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

// ========================================================================================================
// Authorization Admin
// Logout
Route::delete('/4dm1n/logout', [AuthAdminController::class, 'logout'])->name("logout");
// Dashboard
Route::get('/4dm1n/dashboard', [AdminController::class, 'dashboard']);
// Profile
Route::get('/4dm1n/profile', [AdminController::class, 'profile']);
// Form Update Profile
Route::get('/4dm1n/{id}/formUpdateProfile', [AdminController::class, 'formUpdateProfile']);
// Form Action Update Profile
Route::put('/4dm1n/updateProfile', [AdminController::class, 'updateProfile']);


// Menampikan semua data pada Event
Route::get('/4dm1n/event', [AdminController::class, 'getAllEvent']);






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
Route::get('/community/dashboard', [CommunityController::class, 'dashboard']);
// Profile
Route::get('/community/profile', [CommunityController::class, 'profile']);
// Form Update Profile
Route::get('/community/{id}/formUpdateProfile', [CommunityController::class, 'formUpdateProfile']);
// Form Action Update Profile
Route::put('/community/updateProfile', [CommunityController::class, 'updateProfile']);

// Form Tambah Event Community
Route::get("/community/formAddEvent", [CommunityController::class, 'formAddEvent']);
// Action Tambah Event Community
Route::post("/community/addEvent", [CommunityController::class, 'addEvent']);
// Menampilkan data pada Event sesuai community yang login
Route::get("/community/listMyEvent", [CommunityController::class, 'listMyEvent']);






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
Route::get('/organizer/dashboard', [OrganizerController::class, 'dashboard']);
// Profile
Route::get('/organizer/profile', [OrganizerController::class, 'profile']);
// Form Update Profile
Route::get('/organizer/{id}/formUpdateProfile', [OrganizerController::class, 'formUpdateProfile']);
// Form Action Update Profile
Route::put('/organizer/updateProfile', [OrganizerController::class, 'updateProfile']);