<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Str;
use App\Model\User;
use Auth;

class UserController extends Controller
{
    public function profile_index()
    {
        $present_email = Auth::user()->email;
        $profile = User::where('email', $present_email)->first();
        return redirect('/profile')->with('profile', $profile);
    }
}
