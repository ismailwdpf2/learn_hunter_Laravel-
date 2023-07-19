<?php

use App\Http\Controllers\Example\FirstController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
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
    // dd(app());
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//4 way to route>>>>>>
Route::get('test', function () {
    return view('test');
});
Route::get('test1', function () {
    return 'im ismail';
});
Route::view('test2', 'test');

Route::get('/test3', [TestController::class, 'index']);

Route::get('about', function () {
    return view('layouts.about');
});

//name route
Route::get('/jhkjhkjh', function () {
    return view("layouts.contact");
})->name('contact');

//peramitter
Route::get('/servies/{roll}', function ($roll) {
    // return view ("layouts.servies");
    return "my roll is $roll";
});
Route::get('country', function () {
    return view('layouts.country
    ');
})->middleware('country');

//first controller use
Route::get('/FirstController', [FirstController::class,'index']);

require __DIR__ . '/auth.php';


