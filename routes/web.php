<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PhotoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;

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

Route::get('/', [PageController::class,'index']);

Route::get('/hello', [WelcomeController::class,'index']);

Route::get('/world', function(){
    return 'World';
});

Route::get('/welcome', function(){
    return 'Selamat Datang';
});

Route::get('/about', [PageController::class, 'about']);

Route::get('/articles/{id}', [PageController::class, 'articles']);

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

// Route::redirect('/', '/welcome');

Route::view('/welcome', 'welcome', ['name' => 'Taylor']);


Route::resource('photos', PhotoController::class)->only([
    'index', 'show'
]);

Route::resource('photos', PhotoController::class)->except([
    'create', 'store', 'update', 'destroy'
]);

Route::get('/greeting', [WelcomeController::class,'greeting']);