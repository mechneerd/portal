<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function register(Request $request){
       // dd($request);
        //validate
        $field = $request->validate([
            'name'=>['required','max:100'],
            'email'=>['required','email','unique:users'],
            'password'=>['confirmed','required'],
            'image' => 'nullable|image|max:1024',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('logos', 'public');
            $field['image'] = $path; // Store the path in the data array
        }

        //create user
        $user =User::create($field);

        //log in
        Auth::login($user);

        //redirect

        return redirect()->route('postindex');

    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            
        ]);



        // Attempt to log the user in
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('home'); // Redirect to intended page
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        //dd($request);
        Auth::logout();
        return redirect()->route('login'); // Redirect to login page after logout
    }

    

}
