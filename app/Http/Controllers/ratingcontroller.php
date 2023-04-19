<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ratingcontroller extends Controller
{
    public function saveRate(Request $request)
    {
        // validate the request data
        $validatedData = $request->validate([
            'Rate' => 'required|numeric|min:1|max:5',
            'comment' => 'required|string|max:255',
        ]);
    
        // check if a Rate already exists for the user
        $Rate = Rate::where('user_id', Auth::id())->first();
    
        // if a Rate already exists, update it
        if ($Rate) {
            $Rate->rating = $validatedData['Rate'];
            $Rate->comments = $validatedData['comment'];
            $Rate->save();
        } 
        // if a Rate doesn't exist, create a new one
        else {
            $Rate = new Rate;
            $Rate->user_id = Auth::id();
            $Rate->rating = $validatedData['Rate'];
            $Rate->comments = $validatedData['comment'];
            $Rate->save();
        }
    
        // redirect the user to a success page
        return redirect('/');
    }
    
}
