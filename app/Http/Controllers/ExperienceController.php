<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.experience.index');
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
        $validatedData = $request->validate([
            'designation' => 'required',
            'company' => 'required',
            'address' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'descriptions' => 'required',
        ]);
        $experience = new Experience();
        $experience->designation = $validatedData['designation'];
        $experience->company = $validatedData['company'];
        $experience->address = $validatedData['address'];
        $experience->start_date = $validatedData['start_date'];
        $experience->end_date = $validatedData['end_date'];
        $experience->descriptions = $validatedData['descriptions'];
        
        $experience->save();

        return response()->json(['message' => 'Experience created successfully']);

    }

    /**
     * Display the specified resource.
     */
    public function show(Experience $experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Experience $experience)
    {
        return response()->json($experience);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Experience $experience)
    {
        $validatedData = $request->validate([
            'designation' => 'required',
            'company' => 'required',
            'address' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'descriptions' => 'required',
        ]);
        $experience->designation = $validatedData['designation'];
        $experience->company = $validatedData['company'];
        $experience->address = $validatedData['address'];
        $experience->start_date = $validatedData['start_date'];
        $experience->end_date = $validatedData['end_date'];
        $experience->descriptions = $validatedData['descriptions'];
        
        $experience->save();

        return response()->json(['message' => 'Experience Updated successfully']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Experience $experience)
    {
        //
    }
    public function getExperience()
    {
        $experiences = Experience::all();
        return response()->json($experiences);
    }
}
