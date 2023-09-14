<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.blog.index');
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
            'description' => 'required',
            'image' => 'required',
            'short_description' => 'required',
        ]);
        $blog = new Blog();
        $blog->title = $validatedData['title'];
        $blog->description = $validatedData['description'];
        $blog->short_description = $validatedData['short_description'];
        if($request->image)
        {
            $imageName = time().'.'.$request->image->extension();  
     
            $request->image->move(public_path('backend/img/blogs/'), $imageName);
            $blog->image = $imageName;
        }
        
        $blog->save();

        return response()->json(['message' => 'blog created successfully']);

    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return response()->json($blog);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'short_description' => 'required',
        ]);
        $blog->title = $validatedData['title'];
        $blog->description = $validatedData['description'];
        $blog->short_description = $validatedData['short_description'];
        if($request->image)
        {
            $imageName = time().'.'.$request->image->extension();  
     
            $request->image->move(public_path('backend/img/blogs/'), $imageName);
            $blog->image = $imageName;
        }
        
        $blog->save();

        return response()->json(['message' => 'blog updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }
    public function getBlog()
    {
        $blogs = Blog::get();
        return response()->json($blogs);
    }
}
