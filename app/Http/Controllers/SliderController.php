<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.slider.index');
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
            'title' => 'required',
            'subtitle1' => 'required',
            'subtitle2' => 'required',
            'image' => 'required',
            'link' => 'required',
        ]);
        $slider = new Slider();
        $slider->title = $validatedData['title'];
        $slider->subtitle1 = $validatedData['subtitle1'];
        $slider->link = $validatedData['link'];
        $slider->subtitle2 = $validatedData['subtitle2'];
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('backend/img/sliders/'), $imageName);
            $slider->image = $imageName;
        }
        
        $slider->save();

        return response()->json(['message' => 'slider created successfully']);

    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return response()->json($slider);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'subtitle1' => 'required',
            'subtitle2' => 'required',
            'link' => 'required',
        ]);
        $slider->title = $validatedData['title'];
        $slider->subtitle1 = $validatedData['subtitle1'];
        $slider->link = $validatedData['link'];
        $slider->subtitle2 = $validatedData['subtitle2'];
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('backend/img/sliders/'), $imageName);
            $slider->image = $imageName;
        }
        
        $slider->save();

        return response()->json(['message' => 'slider updated successfully']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        return response()->json(['message' => 'slider deleted successfully']);
    }
    public function getsliders()
    {
        $sliders = Slider::get();
        return response()->json($sliders);
    }
}
