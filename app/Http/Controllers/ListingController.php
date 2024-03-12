<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //Show All Listings
    public function index() {
        
        return view('listings.index', ['listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
    ]);
    }

    //Show Single Listing
    public function show(Listing $listing) {
        return view('listings.show', ['listing' => $listing]);
    
    }
//Show Create Form
public function create() {
    return view('listings.create');
    }

    //Store Listing Data

    public function store(Request $request) {
        //dd($request->all());
        //dd($request->file('logo'));
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]); 

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Listing::create($formFields);
        //For a message, create a component like flash-message.blade.php
        return redirect('/')->with('message', 'Listing created successfuly');
    }

    //Show Edit Form
    public function edit(Listing $listing) {
        //dd($listing);
        //dd($listing->title);
        return view('listings.edit', ['listing' => $listing]);
    }

    //Update Listing data
    public function update(Request $request, Listing $listing) {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ]);
        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
            }
            
            $listing->update($formFields);

            return back()->with('message', 'Listing updated successfully!');
    }

    //Destroy Method
    public function destroy(Listing $listing) {
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully!');
    }
}
