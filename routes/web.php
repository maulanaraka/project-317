<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthCommunityController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\AuthOrganizerController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\IndexController;
// ======================================================================================================
Route::get('/', function () {
    return view('landingPage');
});
Route::get('/accountLogin', function () {
    return view('accountLogin');
});
Route::get('/accountRegister', function () {
    return view('accountRegister');
});
Route::get('/explore',[IndexController::class, 'explore'])->name('explore');
Route::post('/search', [IndexController::class, 'search'])->name('explore');
Route::get('/search', [IndexController::class, 'search'])->name('explore');
Route::get('/forum', [IndexController::class, 'forum'])->name('forum');
Route::post('/search/forum', [IndexController::class, 'forumSearch'])->name('forum');
Route::get('/search/forum', [IndexController::class, 'forumSearch'])->name('forum');



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
Route::get('/4dm1n/event', [AdminController::class, 'getAllEvent'])->name('eventdAdm');
// Menghapus data event
Route::delete('/4dm1n/deleteEvent', [AdminController::class, 'deleteEvent'])->name('eventdAdm');
// Melakukan Approval pada event
Route::put('/4dm1n/approveEvent', [AdminController::class, 'approvalEvent'])->name('eventdAdm');

// Menampilkan data category
Route::get('/4dm1n/category', [AdminController::class, 'getCategory'])->name('categorydAdm');
// Menampilkan Form Update Category
Route::get('/4dm1n/formUpdateCategory/{id}', [AdminController::class, 'formUpdateCategory'])->name('categorydAdm');
// Form Tambah Data
Route::get('/4dm1n/formAddCategory', [AdminController::class, 'formAddCategory'])->name('categorydAdm');
// Action Tambah Data
Route::post('/4dm1n/addCategory', [AdminController::class, 'addCategory'])->name('categorydAdm');
// Action Update Data
Route::put('/4dm1n/updateCategory', [AdminController::class, 'updateCategory'])->name('categorydAdm');
// Action Delete Data
Route::delete('/4dm1n/deleteCategory', [AdminController::class, 'deleteCategory'])->name('categorydAdm');

Route::post('/4dm1n/search', [AdminController::class, 'search']);
Route::get('/4dm1n/search', [AdminController::class, 'search']);
// ========================================================================================================
// Menampilkan data yang dapat dilakukan reporting
Route::get('/4dm1n/forum', [AdminController::class, 'forum'])->name('forumdAdm');
// Melakukan aprove pada forum yang dibuat
Route::put("/4dm1n/approveForum", [AdminController::class, 'approveForum'])->name('forumdAdm');
// Melakukan search pada forum
Route::post("/4dm1n/forum/search", [AdminController::class, 'searchForum'])->name('forumdAdm');
Route::get("/4dm1n/forum/search", [AdminController::class, 'searchForum'])->name('forumdAdm');




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
Route::get('/community/dashboard', [CommunityController::class, 'dashboard'])->name('dashboardCom');
// Dashboard Detail Event()
Route::get('/community/dashboard/event/{id}', [CommunityController::class, 'detailEventDashboard'])->name('myeventCom');
// Melakukan Searching pada Dashboard
Route::post("/community/dashboard/search",[CommunityController::class, 'searchDashboard'])->name('dashboardCom');
Route::get("/community/dashboard/search",[CommunityController::class, 'searchDashboard'])->name('dashboardCom');
// Profile
Route::get('/community/profile', [CommunityController::class, 'profile']);
// Form Update Profile
Route::get('/community/{id}/formUpdateProfile', [CommunityController::class, 'formUpdateProfile']);
// Form Action Update Profile
Route::put('/community/updateProfile', [CommunityController::class, 'updateProfile']);

// Form Tambah Event Community
Route::get('/community/formAddEvent', [CommunityController::class, 'formAddEvent'])->name('addeventCom');
// Action Tambah Event Community
Route::post('/community/addEvent', [CommunityController::class, 'addEvent'])->name('addeventCom');
// Menampilkan data pada Event sesuai community yang login
Route::get('/community/listMyEvent', [CommunityController::class, 'listMyEvent'])->name('myeventCom');
// Form Update Event
Route::get('/community/{id}/formUpdateEvent', [CommunityController::class, 'formUpdateEvent'])->name('myeventCom');
// Action Update Event
Route::put('/community/updateEvent', [CommunityController::class, 'updateEvent'])->name('myeventCom');
// Hapus Event
Route::delete('/community/deleteEvent', [CommunityController::class, 'deleteEvent'])->name('myeventCom');
// Detail Event
Route::get('/community/{id}/detailEvent', [CommunityController::class, 'detailEvent'])->name('myeventCom');
// Malkukan approvee Status pada event
Route::put('/community/updateEventStatus', [CommunityController::class, 'updateEventStatus'])->name('myeventCom');
// Melakukan Searching pada mylistevent
Route::post("/community/listMyEvent/search",[CommunityController::class, 'searchMyEvent'])->name('myeventCom');
Route::get("/community/listMyEvent/search",[CommunityController::class, 'searchMyEvent'])->name('myeventCom');



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
// Dashboard Detail Event()
Route::get('/organizer/dashboard/event/{id}', [OrganizerController::class, 'detailEventDashboard'])->name('dashboardOrg');
// Melakukan Searching pada Dashboard
Route::post("/organizer/dashboard/search",[OrganizerController::class, 'searchDashboard'])->name('dashboardOrg');
Route::get("/organizer/dashboard/search",[OrganizerController::class, 'searchDashboard'])->name('dashboardOrg');
// Melakukan lihat event
Route::get('/lihatevent',[OrganizerController::class, 'lihatevent'])->name('eventOrg');

// Profile
Route::get('/organizer/profile', [OrganizerController::class, 'profile']);
// Form Update Profile
Route::get('/organizer/{id}/formUpdateProfile', [OrganizerController::class, 'formUpdateProfile']);
// Form Action Update Profile
Route::put('/organizer/updateProfile', [OrganizerController::class, 'updateProfile']);

// Form Tambah Event Community
Route::get('/organizer/formAddEvent', [OrganizerController::class, 'formAddEvent'])->name('addEventOrg');
// Action Tambah Event Community
Route::post('/organizer/addEvent', [OrganizerController::class, 'addEvent'])->name('addEventOrg');
// Menampilkan data pada Event sesuai community yang login
Route::get('/organizer/listMyEvent', [OrganizerController::class, 'listMyEvent'])->name('myeventOrg');
// Form Update Event
Route::get('/organizer/{id}/formUpdateEvent', [OrganizerController::class, 'formUpdateEvent'])->name('myeventOrg');
// Action Update Event
Route::put('/organizer/updateEvent', [OrganizerController::class, 'updateEvent'])->name('myeventOrg');
// Hapus Event
Route::delete('/organizer/deleteEvent', [OrganizerController::class, 'deleteEvent'])->name('myeventOrg');
// Detail Event
Route::get('/organizer/{id}/detailEvent', [OrganizerController::class, 'detailEvent'])->name('myeventOrg');
// Update Status Event
Route::put('/organizer/updateEventStatus', [OrganizerController::class, 'updateEventStatus'])->name('myeventOrg');
// Melakukan Searching pada mylistevent
Route::post("/organizer/listMyEvent/search",[OrganizerController::class, 'searchMyEvent'])->name('myeventOrg');
Route::get("/organizer/listMyEvent/search",[OrganizerController::class, 'searchMyEvent'])->name('myeventOrg');

// Report

// Menampilkan data yang dapat dilakukan reporting
Route::get('/organizer/forum', [OrganizerController::class, 'forum'])->name('forumOrg')->name('forumOrg');
// Menampilkan form membuat report
Route::get('/organizer/formAddReport', [OrganizerController::class, 'formAddReport'])->name('forumOrg');
// Menampilkan action membuat report
Route::post('/organizer/addReport', [OrganizerController::class, 'addReport'])->name('forumOrg');
// Melakukan Searching pada mylistevent
Route::post("/organizer/forum/search",[OrganizerController::class, 'searchForum'])->name('forumOrg');
Route::get("/organizer/forum/search",[OrganizerController::class, 'searchForum'])->name('forumOrg');