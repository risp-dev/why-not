<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

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

//All listings
Route::get('/', function() {
    return view('listings', [
        'heading' => 'Headingas listingui',
        'listings' => Listing::all()
        
    ]);
});

//Single listing
// Route::get('/listings/{id}', function($id) {
//     return view('listing', [
//         'listing' => Listing::find($id)
//     ]);
// });

//Single listing ammended with 404
Route::get('/listings/{listing}', function(Listing $listing) {
    return view('listing', [
        'listing' => $listing
    ]);
});



Route::get('/labas', function() {
    return response('<h1>As sakau labas</h1>', 200)
    ->header('Content-Type', 'text/plain');
});

Route::get('posts/{id}', function($id) {
    return response('Post ' . $id);
})->where('id', '[0-9]+');

Route::get('/search', function(Request $request) {
    dd($request);
    //return $request->name . ' ' . $request->city;
});