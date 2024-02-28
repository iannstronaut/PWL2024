<?php

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
    return view('welcome');
});

Route::get('/hello', function(){
    return 'Hello World';
});

Route::get('/world', function(){
    return 'World';
});

Route::get('/welcome', function(){
    return 'Selamat Datang';
});

Route::get('/about', function(){
    return 'Al Byan Agung Shafiqri (2241720080)';
});

Route::get('/user/profile', function(){
    
})->name('profile');


Route::get('/user/{name?}', function ($name='John') {
    return 'Nama saya '.$name;
});
   
Route::get('/posts/{post}/comments/{comments}', function($postId, $commentId){
    return 'Pos ke-'.$postId." Komentar ke-: ".$commentId;
});

Route::middleware(['first', 'second'])->group(function () {
    Route::get('/', function () {
        // Uses first & second middleware...
    });
    Route::get('/user/profile', function () {
        // Uses first & second middleware...
    });
});
Route::domain('{account}.example.com')->group(function () {
    Route::get('user/{id}', function ($account, $id) {
        //
    });
});
Route::middleware('auth')->group(function () {
   Route::get('/user', [UserController::class, 'index']);
   Route::get('/post', [PostController::class, 'index']);
   Route::get('/event', [EventController::class, 'index']);
});
   
Route::prefix('admin')->group(function () {
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/post', [PostController::class, 'index']);
    Route::get('/event', [EventController::class, 'index']);
});

Route::redirect('/', '/welcome');

Route::view('/welcome', 'welcome', ['name' => 'Taylor']);
