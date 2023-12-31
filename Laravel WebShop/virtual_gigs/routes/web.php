<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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
//All listings
Route::get('/', [ListingController::class, 'index']);

//Show create form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

//Store Listing
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');


//Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

//Update listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

//Delete listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

//Show edit form 
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

//Show Register/Create form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');


//Create new user
Route::post('/users', [UserController::class, 'store']);

//Log user out
Route::post('/logout', [UserController::class, 'logout']);


//Show log in form 
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//Log in user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);





// Route::get('/hello', function () {
//     return response('<h1> Hello world </h1>', 200)
//         ->header('Content-Type', 'text/plain')
//         ->header('foo', 'bar');
// });

// Route::get('/posts/{id}', function ($id) {
//     dd($id);
//     return response('Post ' . $id);
// })->where('id', '[0-9]+');


// Route::get('/search', function (Request $request) {
//     return ($request->name . ' ' . $request->city);
// });
