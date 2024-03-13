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
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//All listings
Route::get('/', [ListingController::class, 'index']);

 //Show Create Form
 Route::get('/listings/create', [ListingController::class, 'create']);

 //Store Listing Data
 Route::post('/listings', [ListingController::class, 'store']);

 //Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

//Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update']);

//Delete Listing (destroy or delete or Petras - no matter but the same must be on controller)
Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);

 //Single listing ammended with 404 and it must be below a create and store
Route::get('/listings/{listing}', [ListingController::class, 'show']);

//Show Register/Create Form php artisan make:controller UserController
Route::get('/register', [UserController::class, 'create']);

//Create New User
Route::post('/users', [UserController::class, 'store']);