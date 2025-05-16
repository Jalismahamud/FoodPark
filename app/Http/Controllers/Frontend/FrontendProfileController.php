<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Frontend\ProfileUpdateRequest;

class FrontendProfileController extends Controller
{
     public function updateProfile(ProfileUpdateRequest $request) :RedirectResponse
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        // toastr()->success('Profile Updated Successfully!');
        session()->flash('success', 'Profile Updated Successfully!');

        return redirect()->back();
        
    }
}
