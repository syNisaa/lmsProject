<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/admin', [DashboardController::class, 'index']);

// Frontend 
Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/about', function () {
    return view('frontend.about');
});

Route::get('/contact', function () {
    return view('frontend.contact');
});

Route::get('/courses', function () {
    return view('frontend.courses');
});

Route::get('/event', function () {
    return view('frontend.event');
});

Route::get('/portofolio', function () {
    return view('frontend.portofolio');
});

Route::get('/mentor', function () {
    return view('frontend.profile');
});


//------------------------------------------halaman backend--------------------------------------------
Route::get('/Administrator', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::resource('/course', CourseController::class)->middleware('auth');
Route::resource('/data_course', CourseController::class)->middleware('auth');
Route::get('/course-pdf', [CourseController::class, 'coursePDF'])->name('course.pdf')->middleware('auth');
Route::get('/course-excel', [CourseController::class, 'courseExcel'])->name('course.excel')->middleware('auth');

Route::resource('/mentor', MentorController::class)->middleware('auth');
Route::resource('/data_mentor', MentorController::class)->middleware('auth');
Route::get('/mentor-pdf', [MentorController::class, 'mentorPDF'])->name('mentor.pdf')->middleware('auth');
Route::get('/mentor-excel', [MentorController::class, 'mentorExcel'])->name('mentor.excel')->middleware('auth');

Route::resource('/peserta', PesertaController::class)->middleware('auth');
Route::get('/peserta-pdf', [PesertaController::class, 'pesertaPDF'])->name('peserta.pdf')->middleware('auth');
Route::get('/peserta-excel', [PesertaController::class, 'pesertaExcel'])->name('peserta.excel')->middleware('auth');

Route::resource('/user', UserController::class)->middleware('auth');

Route::resource('/kategori', KategoriController::class)->middleware('auth');
Route::resource('/event', EventController::class)->middleware('auth');
Route::resource('/quiz', QuizController::class)->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
