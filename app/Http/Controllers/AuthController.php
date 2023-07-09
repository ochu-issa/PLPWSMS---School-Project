<?php

namespace App\Http\Controllers;

use App\Http\Requests\authenticationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function loginPage()
    {
        return view('auth.login');
    }

    //authentication page
    public function authentication(authenticationRequest $request)
    {
        //dd('test');
        $request->validated($request->all());

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('dashboard')->with('success', 'welcome! you have been loggen in');
        }else{
            return back()->with('error', 'Invalid crediantial');
        }
    }

    //logout function
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'welcome back!');
    }
}
