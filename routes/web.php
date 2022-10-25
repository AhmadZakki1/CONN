<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\projectcontroller;
use App\Http\Controllers\kontakController;
use App\Http\Controllers\LoginController;

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
// admin
Route::middleware('auth')->group(function(){
    Route::get('/', function () {
        return view('admin.app');
    });
    Route::get('/dashboard',[DashboardController::class,'index'])->middleware('auth');
    Route::get('/mastersiswa/(id_siswa)/hapus',[SiswaController::class,'hapus'])->name('mastersiwa.hapus');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::resource('/project',projectcontroller::class);
    Route::resource('/kontak',kontakController::class);
    Route::Resource('/Siswa', SiswaController::class);
 });
 // Route guest
 Route::middleware('guest')->group(function(){
    Route::get('/login', [logincontroller::class, 'index'])->name('login');
    Route::post('/login', [logincontroller::class, 'authenticate'])->name('login.auth');
 });


// Route::get('/login', [LoginController::class,'index'])->name('login')->middleware('guest');
// Route::post('/login',[LoginController::class, 'authenticate'])->name('login.auth')->middleware('guest');
// Route::post('logout', [LoginController::class, 'logout'])->name('logout')->middleware('guest');
// Route::get('/dashboard',[DashboardController::class,'index']);
// Route::get('/mastersiswa/(id_siswa)/hapus',[SiswaController::class,'hapus'])->name('mastersiwa.hapus');
// Route::resource('/Siswa',SiswaController::class);
// Route::resource('/project',projectcontroller::class);
// Route::resource('/kontak',kontakController::class);


// Route::get('/about', function () {
//     return view('about');
// });
// Route::get('/contact', function () {
//     return view('contact');
// });
// Route::get('/project', function () {
//     return view('project');
// });
// Route::get('/mastersiswa', function () {
//     return view('admin.mastersiswa');
// });
// Route::get('/masterproject', function () {
//     return view('admin.masterproject');
// });
// Route::get('/masterkontak', function () {
//     return view('admin.masterkontak');
// });
