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
Route::delete('/4dm1n/logout', [AuthAdminController::class, 'logout'])->name('logout');
// Dashboard
Route::get('/4dm1n/dashboard', [AdminController::class, 'dashboard'])->name('dashboardAdm');
// Profile
Route::get('/4dm1n/profile', [AdminController::class, 'profile']);
// Form Update Profile
Route::get('/4dm1n/{id}/formUpdateProfile', [AdminController::class, 'formUpdateProfile']);
// Form Action Update Profile
Route::put('/4dm1n/updateProfile', [AdminController::class, 'updateProfile']);

// Menampikan semua data pada Event
Route::get('/4dm1n/event', [AdminController::class, 'getAllEvent']);
// Menghapus data event
Route::delete('/4dm1n/deleteEvent', [AdminController::class, 'deleteEvent']);
// Melakukan Approval pada event
Route::put('/4dm1n/approveEvent', [AdminController::class, 'approvalEvent']);

// Menampilkan data category
Route::get('/4dm1n/category', [AdminController::class, 'getCategory']);
// Menampilkan Form Update Category
Route::get('/4dm1n/formUpdateCategory/{id}', [AdminController::class, 'formUpdateCategory']);
// Form Tambah Data
Route::get('/4dm1n/formAddCategory', [AdminController::class, 'formAddCategory']);
// Action Tambah Data
Route::post('/4dm1n/addCategory', [AdminController::class, 'addCategory']);
// Action Update Data
Route::put('/4dm1n/updateCategory', [AdminController::class, 'updateCategory']);
// Action Delete Data
Route::delete('/4dm1n/deleteCategory', [AdminController::class, 'deleteCategory']);

// ========================================================================================================
// Menampilkan data yang dapat dilakukan reporting
Route::get('/4dm1n/forum', [AdminController::class, 'forum']);
// Melakukan aprove pada forum yang dibuat
Route::put("/4dm1n/approveForum", [AdminController::class, 'approveForum']);




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
Route::get('/community/formAddEvent', [CommunityController::class, 'formAddEvent']);
// Action Tambah Event Community
Route::post('/community/addEvent', [CommunityController::class, 'addEvent']);
// Menampilkan data pada Event sesuai community yang login
Route::get('/community/listMyEvent', [CommunityController::class, 'listMyEvent']);
// Form Update Event
Route::get('/community/{id}/formUpdateEvent', [CommunityController::class, 'formUpdateEvent']);
// Action Update Event
Route::put('/community/updateEvent', [CommunityController::class, 'updateEvent']);
// Hapus Event
Route::delete('/community/deleteEvent', [CommunityController::class, 'deleteEvent']);
// Detail Event
Route::get('/community/{id}/detailEvent', [CommunityController::class, 'detailEvent']);

Route::put('/community/updateEventStatus', [CommunityController::class, 'updateEventStatus']);


// ========================================================================================================
//Organizer

// #Route form login Organizer
Route::get('/organizer/login', [AuthOrganizerController::class, 'formLogin']);
// #Route form registrasi Organizer
Route::get('/organizer/registrasi', [AuthOrganizerController::class, 'formRegistrasi']);
// #Route Tambah data registrasi pada Organizer
Route::post('/organizer/registrasi', [AuthOrganizerController::class, 'registrasi'])->name('actionRegistrasi');
// #route Login Organizer
Route::post('/organizer/login', [AuthOrganizerController::class, 'login'])->name('actionLogin');

// Authorization Organizer
// Logout
Route::delete('/organizer/logout', [AuthOrganizerController::class, 'logout']);
// Dashboard
Route::get('/organizer/dashboard', [OrganizerController::class, 'dashboard'])->name('dashboardOrg');
// Profile
Route::get('/organizer/profile', [OrganizerController::class, 'profile']);
// Form Update Profile
Route::get('/organizer/{id}/formUpdateProfile', [OrganizerController::class, 'formUpdateProfile']);
// Form Action Update Profile
Route::put('/organizer/updateProfile', [OrganizerController::class, 'updateProfile']);

// Form Tambah Event Community
Route::get('/organizer/formAddEvent', [OrganizerController::class, 'formAddEvent'])->name('addEventOrg');
// Action Tambah Event Community
Route::post('/organizer/addEvent', [OrganizerController::class, 'addEvent']);
// Menampilkan data pada Event sesuai community yang login
Route::get('/organizer/listMyEvent', [OrganizerController::class, 'listMyEvent'])->name('eventOrg');
// Form Update Event
Route::get('/organizer/{id}/formUpdateEvent', [OrganizerController::class, 'formUpdateEvent']);
// Action Update Event
Route::put('/organizer/updateEvent', [OrganizerController::class, 'updateEvent']);
// Hapus Event
Route::delete('/organizer/deleteEvent', [OrganizerController::class, 'deleteEvent']);
// Detail Event
Route::get('/organizer/{id}/detailEvent', [OrganizerController::class, 'detailEvent']);
// Update Status Event
Route::put('/organizer/updateEventStatus', [OrganizerController::class, 'updateEventStatus']);

// Report

// Menampilkan data yang dapat dilakukan reporting
Route::get('/organizer/forum', [OrganizerController::class, 'forum'])->name('ForumOrg');
// Menampilkan form membuat report
Route::get('/organizer/formAddReport', [OrganizerController::class, 'formAddReport']);
// Menampilkan action membuat report
Route::post('/organizer/addReport', [OrganizerController::class, 'addReport']);
