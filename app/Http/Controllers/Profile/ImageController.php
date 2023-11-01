<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function update()
    {
        //store Image
        // return response()->redirectTo('/profile');
        // return response()->redirectTo(route('profile.edit'));
        // or u can use back() for redirecting
        return back()->with('message','Image is changed.');
    }
}
