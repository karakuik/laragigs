<?php


use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/hello', function () {
    return response('<h1>Hello World!</h1>', 200)
        ->header('Content-Type', 'text/plain') //Regular header, will remove html so <h1> will appear on screen
        ->header('foo', 'bar'); //Custom header
});

//Wild card route
Route::get('posts/{id}', function($id){
    //dd($id); //Debugging tool called Die & Dump
    //ddd($id); //Is Die Dump and Debug w/ lots of info
    return response('Post ' . $id);
})->where('id', '[0-9]+'); // Constraint using regex, IDs cant be strings

Route::get('/search', function(Request $request){
    dd($request->name . ' ' .  $request->city);
    //http://laragigs.dev/search?name=Ryan&city=Miami can check like this
    //or
    //return($request->name . ' ' . $request->city);
});

// This is where the real code starts


// All Listings Original
//Route::get('/', function () {
//    return view('listings', [
//        'heading' => 'latest listings',
//        'listings' => Listing::all()
//    ]);
//});

//Route::get('/listings/{id}', function($id){ // Old model :) not using route model binding
//    $listing = Listing::find($id);
//    if($listing) {
//        return view('listing',[
//            'listing' => $listing
//        ]);
//    }
//    else {
//        abort('404');
//    }
//});

//Get all listings
Route::get('/', [ListingController::class, 'index']);

// Show Create form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Store Listing Data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');;

// Show edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// Single Listing
// POTENTIAL BUG!!! If making a new /listings/XXX, if listings/{XXX} is on top, it will try to go to that first
// So you will not be able to access create, unless this route is beneath it
Route::get('/listings/{listing}', [ListingController::class, 'show']);


// Show register create form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest'); // name login redirects 3:48:43, redirects to login route, will redir if someone is not able to access something they shouldnt (i.e. logged out and try to post a new job(

// Log in User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

//Thanks for Playing!
