<?php

use App\Http\Controllers\UploadController;
Use App\Http\Controllers\AuthManager;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');
Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');
Route::get('/logout', [AuthManager::class, 'logout'])->name('welcome');
Route::group(['middleware' => 'auth'], function(){
    Route::get('/profile', function(){
        return "Hi";
    });
});
// Route::get('/uploads', [UploadController::class, 'upload'])->name('upload');
// Route::post('/upload', [UploadController::class, 'uploadPost'])->name('upload.post');
// Route::get('/upload', [UploadController::class,'upload']);
// Route::get('/upload', 'HomeController@index')->name('upload');
Route::resource('uploads', UploadController::class);


