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


// ------------- BACKEND ---------------------
Route::resource('/course', CourseController::class);
Route::resource('/mentor', MentorController::class);
Route::resource('/data_mentor', MentorController::class);
Route::resource('/data_course', CourseController::class);
Route::resource('/event', EventController::class);
Route::resource('/quiz', QuizController::class);
Route::resource('/peserta', PesertaController::class);
Route::resource('/kategori', KategoriController::class);
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/generate-pdf', [CourseController::class, 'generatePDF']);
Route::get('/course-pdf', [CourseController::class, 'coursePDF'])->name('course.pdf');
