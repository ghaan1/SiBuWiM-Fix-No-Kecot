<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function indexForgetPassword()
    {
        return view('auth.passwords.reset');
    }

    public function storeForgetPassword(Request $req)
    {
        $user = User::where('email', $req->email)->first();
        $user->password = bcrypt($req->password);
        $user->save();

        return redirect('/login');
    }
}
