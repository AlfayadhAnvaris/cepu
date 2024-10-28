<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;



Route::get('/', [FrontController::class, 'semuaPengaduan'])->name('guest.allcomplaint');
Route::get('/complaint-statistics', [FrontController::class, 'semuaStatistik'])->name('guest.alldata');
Route::get('/complaint-form', [FrontController::class, 'formPengaduan'])->name('guest.formcomplaint');
Route::post('/complaint-form/store', [FrontController::class, 'storeComplaint'])->name('guest.formcomplaint.store');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::group(['middleware'=>'guest'],  function () {
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post( 'login', [LoginController::class, 'login']);
Route::get('register', [LoginController::class, 'showRegistrationForm'])->name('register');
Route::post( 'register', [LoginController::class, 'register']);
});

Route::middleware(['auth'])->group(function(){
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(): void{
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/users', [UsersController::class, 'index'])->name('admin.users.index');
    Route::post('/users/store', [UsersController::class, 'store'])->name('admin.users.store');
    Route::get('/users/edit/{id}', [UsersController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/update{id}', [UsersController::class, 'update'])->name('admin.users.update');
    Route::post('/users/destroy/{id}', [UsersController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('/complaint', [AdminController::class, 'allComplaints'])->name('admin.all.complaints');
    Route::get('/complaint/{id}response/', [AdminController::class, 'allComplaint'])->name('response.complaints');
    Route::get('/complaint/{id}response/', [AdminController::class, 'showComplaint'])->name('response.complaints');
  Route::get('/all-pending-complaints', [AdminController::class, 'allPendingComplaints'])->name('admin.all.pending.complaints');
    Route::get('/all-process-complaints', [AdminController::class, 'allProcessComplaints'])->name('admin.all.process.complaints');
    Route::get('/all-success-complaints', [AdminController::class, 'allSuccessComplaints'])->name('admin.all.success.complaints');
    
    });


require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
