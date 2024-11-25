<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    public function showChangePassword(Request $request){
        return view('password.edit');
    }

    public function updatePassword(Request $request){
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8', 
            'confirm_password' => 'required|min:8|same:password', 
        ]);

        // Check if the current password matches
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->with(['change_password_failed' => 'Change Password Failed']);
        }

        User::find(Auth()->user()->id)->update(['password'=>Hash::make($request->password)]);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with(['password_changed' => 'Your password has been changed. Please log in again.']);
    }
}