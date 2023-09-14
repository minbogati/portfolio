<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Profile;
use App\Models\Slider;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function slidersList()
    {
        $data['sliders'] = Slider::get();
        $data['profile'] = Profile::first();
        $data['categories'] = Category::get();
        $data['testimonials'] = Testimonial::get();
        return view('frontend.welcome', compact('data'));
    }
    public function getTestimonials() 
    {
        try{
            $testimonials = Testimonial::get();
            return response()->json($testimonials);
        }catch(\Exception $e){
            return response()->json('message','Testimonials Not Found');
        }
    }
}
