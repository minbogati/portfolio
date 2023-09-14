<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = Profile::first();
        return view('backend.profile.index', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Profile();
        $product->name = $request->input('name');
        $product->mobile = $request->input('mobile');
        $product->email = $request->input('email');
        $product->address = $request->input('address');
        $product->alternative_mobile = $request->input('alternative_mobile');
        $product->designation = $request->input('designation');
        $product->short_description = $request->input('short_description');
        $product->description = $request->input('description');
        $product->facebook = $request->input('facebook');
        $product->linkedin = $request->input('linkedin');
        $product->instagram = $request->input('instagram');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('backend/img/profiles/'), $imageName);
            $product->image = $imageName;
        }
        // Fill in other fields as needed...
        $product->save();

        // You can return a response if needed
        return response()->json(['message' => 'Profile saved successfully'], 200);
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        $profile->name = $request->input('name');
        $profile->mobile = $request->input('mobile');
        $profile->email = $request->input('email');
        $profile->address = $request->input('address');
        $profile->alternative_mobile = $request->input('alternative_mobile');
        $profile->designation = $request->input('designation');
        $profile->short_description = $request->input('short_description');
        $profile->description = $request->input('description');
        $profile->facebook = $request->input('facebook');
        $profile->linkedin = $request->input('linkedin');
        $profile->instagram = $request->input('instagram');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('backend/img/profiles/'), $imageName);
            $profile->image = $imageName;
        }
        // Fill in other fields as needed...
        $profile->save();

        // You can return a response if needed
        return response()->json($profile);
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
