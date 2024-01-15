<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // Show all Listings (get & show)
    public function index(){
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
            // Can use simplePaginate if you want Next & Previous instead of pages
        ]);
    }

    //Show single listing
    public function show(Listing $listing){
        return view('listings.show',[
            'listing' => $listing
        ]);
    }

    // Show Create Form
    public function create(){
        return view('listings.create');
    }

    // Store Listing Data
    public function store(Request $request){
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')], //Rule allows us to have a unique company name, while it checks listings for company name
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public'); //Makes dir logos
        }

        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully!');
    }

}
