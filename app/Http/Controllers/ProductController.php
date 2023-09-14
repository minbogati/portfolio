<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Product::all();
        return view('backend.product.index',compact('categories'));
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
            'link' => 'required',
            'category_id' => 'required',
            'amount' => 'required',
        ]);
        $product = new Product();
        $product->title = $validatedData['title'];
        $product->descriptions = $validatedData['description'];
        $product->link = $validatedData['link'];
        $product->amount = $validatedData['amount'];
        $product->category_id = $validatedData['category_id'];
        if($request->image)
        {
            $imageName = time().'.'.$request->image->extension();  
     
            $request->image->move(public_path('backend/img/products/'), $imageName);
            $product->image = $imageName;
        }
        
        $product->save();

        return response()->json(['message' => 'Product created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'link' => 'required',
            'category_id' => 'required',
            'amount' => 'required',
        ]);
        $product->title = $validatedData['title'];
        $product->descriptions = $validatedData['description'];
        $product->link = $validatedData['link'];
        $product->amount = $validatedData['amount'];
        $product->category_id = $validatedData['category_id'];
        if($request->image)
        {
            $imageName = time().'.'.$request->image->extension();  
     
            $request->image->move(public_path('backend/img/products/'), $imageName);
            $product->image = $imageName;
        }
        
        $product->save();

        return response()->json(['message' => 'Product Updated successfully']);
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([
            'message'=>'Product Deleted Successfully!!'
        ]);
    }
    public function getProducts()
    {
        $products = Product::all();
        return response()->json($products);
    }
}
