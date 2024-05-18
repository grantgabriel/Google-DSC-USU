<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function index(){
        return view('profile.profile');
    }

    public function edit(){
        return view('profile.editprofile');
    }

    public function editdata(Request $request){
        $user = Auth::user();
        $user->first_name = $request->input('firstname');
        $user->last_name = $request->input('lastname');
        $user->address = $request->input('address');
        $user->pronoun = $request->input('pronoun');
        $user->bio = $request->input('bio');

            

            if ($request->hasFile('pp')) {
    
                
                $extension = $request->file('pp')->getClientOriginalExtension();
                $today = now()->format('dmY_His');
                $newName = Auth::user()->first_name . '-' . 'profile-image' . '-' . $today . '-' . Str::random(10) . '.' . $extension;
                $request->file('pp')->move(public_path('profile_pic'), $newName);
                $request['pp'] = $newName;
                $user->profile_photo = $newName;
            }
    
            $user->update($request->all());
        

        $user->save();
        return redirect()->route('profile')->with('success', 'Profile updated successfully');
    }
}
