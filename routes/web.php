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


// All Listings
Route::get('/', function () {
    return view('listings', [
        'heading' => 'latest listings',
        'listings' => Listing::all()
    ]);
});

Route::get('/listing/{id}', function($id){
    return view('listing',[
        'listing' => Listing::find($id)
    ]);
});
