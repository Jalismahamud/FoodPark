<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Traits\FileUploadTrait;
use App\Http\Requests\Frontend\ProfileUpdateRequest;

class FrontendProfileController extends Controller
{
    use FileUploadTrait;
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

public function updateAvatar(Request $request)
{
    $imagePath = $this->uploadImage($request, 'avatar');

    $user = Auth::user();
    $user->avatar = $imagePath;
    $user->save();

    return response(['status' => 'success', 'message' => 'Profile uploaded Successfully!'], 200);
}
}