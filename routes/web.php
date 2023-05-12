<?php

use App\Http\Controllers\BlogsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ratingcontroller;
use App\Http\Livewire\BlogComponent;
use App\Models\BlogPost;
use App\Models\Rate;
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
    $rating=Rate::all();
    $rating_total=Rate::sum('rating');
    
        // Fetch the latest 4 blog posts
        $latestBlogPosts = BlogPost::orderBy('created_at', 'desc')->take(4)->get();

   
    
            if ($rating->count()>0) {
                $rating_value=$rating_total/$rating->count();
            }
           else {
        $rating_value=0;
                }


    return view('welcome',compact('rating_value','rating','latestBlogPosts'));
});

Route::get('/dashboard', function () { $rating=Rate::all();
    $rating_total=Rate::sum('rating');
    $latestBlogPosts = BlogPost::orderBy('created_at', 'desc')->take(4)->get();
            if ($rating->count()>0) {
                $rating_value=$rating_total/$rating->count();
            }
           else {
        $rating_value=0;
                }


    return view('welcome',compact('rating_value','rating','latestBlogPosts'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/save-rating', [ratingcontroller::class,'saveRate'])->name('saveRating');
    
    Route::resource('blog-posts', BlogsController::class);

});

Route::middleware('auth','admin')->group(function () {
    Route::get('/blog', BlogComponent::class);
});
require __DIR__.'/auth.php';
