<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentRegistrationController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'Authlogin']);
Route::get('logout', [AuthController::class, 'logout']);

Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('admin/admin/list', function () {
    return view('admin.admin.list');
});

Route::group(['middleware' => 'admin'], function (){
    Route::get('admin/dashboard', function () {
        return view('admin.dashboard');
    });
});

Route::group(['middleware' => 'student'], function (){
    Route::get('student/dashboard', function () {
        return view('admin.dashboard');
    });
});

Route::group(['middleware' => 'teacher'], function (){
    Route::get('teacher/dashboard', function () {
        return view('admin.dashboard');
    });
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/register', [StudentRegistrationController::class, 'showRegistrationForm'])->name('student.register');
Route::post('/register', [StudentRegistrationController::class, 'processRegistration']);
Route::get('/login', [StudentRegistrationController::class, 'showLoginForm']);
Route::post('/login', [StudentRegistrationController::class, 'processLogin']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});
