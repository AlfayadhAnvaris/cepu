<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    //return view('welcome');
    // return view ('front.index');
    // return view ('front.semua-pengaduan');
     return view('dashboard.index');
    // return view ('front.statistik');
    // return view ('front.form-pengaduan');
})->middleware(['auth']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::group(['middleware'=>'guest'],  function () {
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post( 'login', [LoginController::class, 'login']);
Route::get('register', [LoginController::class, 'showRegistrationForm'])->name('register');
Route::post( 'register', [LoginController::class, 'register']);
});

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(): void{
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    });


require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
