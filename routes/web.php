<?php

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
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';




// Route Group (for routes starting with 'admin' (Admin Route Group)) (https://laravel.com/docs/9.x/routing#route-group-prefixes)
Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function() {
    // Matches the '/admin/login' URL
    Route::match(['get', 'post'], 'login', 'AdminController@login'); // match() method is used to use more than one HTTP request method for the same route (e.g. GET and POST)
    // Matches the '/admin/dashboard' URL
    Route::get('dashboard', 'AdminController@dashboard');
});

// Admin Login page Route WTIHOUT Admin Group
// Route::get('/admin/login', ['App\Http\Controllers\Admin\AdminController', 'login']); // is the same as:    Route::get('/admin/dashboard', 'App\Http\Controllers\Admin\AdminController@login');

// Admin Dashboard Route WTIHOUT Admin Route Group
// Route::get('/admin/dashboard', ['App\Http\Controllers\Admin\AdminController', 'dashboard']); // is the same as:    Route::get('/admin/dashboard', 'App\Http\Controllers\Admin\AdminController@dashboard');