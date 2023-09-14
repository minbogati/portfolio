<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\SliderController;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Profile;
use App\Models\Slider;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
        $data['sliders'] = Slider::first();
        $data['profile'] = Profile::first();
        $data['categories'] = Category::get();
        $data['testimonials'] = Testimonial::get();
        $data['blogs'] = Blog::get();
        return view('frontend.welcome', compact('data'));
});
// Custom login route
Route::get('/techmin', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('techmin');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
Route::resource('sliders', SliderController::class);
Route::get('get-categories', [CategoryController::class, 'getCategories'])->name('getCategories');
Route::get('get-products', [ProductController::class, 'getProducts'])->name('getProducts');
Route::get('get-sliders', [SliderController::class, 'getsliders'])->name('getsliders');
Route::get('get-experiences', [ExperienceController::class, 'getExperience'])->name('getExperience');
Route::get('get-blogs', [BlogController::class, 'getBlog'])->name('getBlog');
Route::resource('profiles', ProfileController::class);
Route::resource('experiences', ExperienceController::class);
Route::resource('testimonials', TestimonialController::class);
Route::get('getTestimonials', [TestimonialController::class, 'getTestimonials' ])->name('getTestimonials');
Route::resource('blogs', BlogController::class);

Route::get('sliders-list', [IndexController::class, 'slidersList'])->name('slidersList');
Route::get('getTestimonials', [IndexController::class, 'getTestimonials'])->name('getTestimonials');