<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.testimonial.index');
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
            'title' => 'required|string|max:255',
            'image' => 'required',
            'name' => 'required',
            'message' => 'required',
            'designation' => 'required',
        ]);
        $testimonial = new Testimonial();
        $testimonial->title = $validatedData['title'];
        $testimonial->name = $validatedData['name'];
        $testimonial->designation = $validatedData['designation'];
        $testimonial->message = $validatedData['message'];
        if($request->image)
        {
            $imageName = time().'.'.$request->image->extension();  
     
            $request->image->move(public_path('backend/img/testimonials/'), $imageName);
            $testimonial->image = $imageName;
        }
        
        $testimonial->save();

        return response()->json(['message' => 'testimonial created successfully']);
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        return response()->json($testimonial);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
       
        $testimonial->title = $request['title'];
        $testimonial->name = $request['name'];
        $testimonial->designation = $request['designation'];
        $testimonial->message = $request['message'];
        if($request->new_image)
        {
            $imageName = time().'.'.$request->new_image->extension();  
     
            $request->new_image->move(public_path('backend/img/testimonials/'), $imageName);
            $testimonial->image = $imageName;
        }
        
        $testimonial->save();

        return response()->json(['message' => 'testimonial Updated successfully']);
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        try{
            $testimonial->delete();
            return response()->json('message', 'testimonial Deleted successfully');
        }catch(\Exception $e) {
            return response()->json('error', 'testimonial not found');
        }
        

    }
    public function getTestimonials()
    {
        try{
            $testimonials = Testimonial::get();
        return response()->json($testimonials);
        } catch (\Exception $e){
            return response()->json('error','Testimonials could not be found');
        }
        
    }
}
