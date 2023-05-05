<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ratingcontroller;
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
    
            if ($rating->count()>0) {
                $rating_value=$rating_total/$rating->count();
            }
           else {
        $rating_value=0;
                }


    return view('welcome',compact('rating_value','rating'));
});

Route::get('/dashboard', function () { $rating=Rate::all();
    $rating_total=Rate::sum('rating');
    
            if ($rating->count()>0) {
                $rating_value=$rating_total/$rating->count();
            }
           else {
        $rating_value=0;
                }


    return view('welcome',compact('rating_value','rating'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/save-rating', [ratingcontroller::class,'saveRate'])->name('saveRating');

});

require __DIR__.'/auth.php';
