<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminPasswordController extends Controller
{
    public function changePassword()
    {
        return view('backend.passwords.changepass');
    }

    public function updatePassword(Request $request)
    {
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }

        //The new password can't be the same with the old password
        if(strcmp($request->old_password, $request->new_password) == 0){
            return back()->with("error", "New Password can't be the same with Old Password. Please choose a different password!");
         }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully!");
    }
}
