<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthManager extends Controller
{
    function login(){
        return view('login');
    }

    function registration(){
        return view('registration');
    }

function loginPost(Request $request)
{
    $request->validate([
        'login' => 'required', // This will accept email, username, or phone number
        'password' => 'required'
    ]);

    // Get the login value (email, username, or phone number)
    $login = $request->input('login');
    $password = $request->input('password');

    // Check if the input is email, username, or phone number
    $user = \App\Models\User::where(function($query) use ($login) {
        $query->where('email', $login)
              ->orWhere('username', $login);  // Assuming 'username' is a column in your users table
            //   ->orWhere('phonenumber', $login);  // Uncomment if you want to support phone number login
    })->first();

    // If a user is found and the password matches
    if ($user && Hash::check($password, $user->password)) {
        Auth::login($user); // Log in the user
        return redirect()->intended(route('home'));
    }

    // If authentication fails
    return redirect(route('login'))->with("error", "Login details are not valid");
}


function registrationPost(Request $request){
    $request->validate([
        'firstname' => 'required',
        'middlename' => 'required',
        'surname' => 'required',
        'address' => 'required',
        'username' => 'required',
        'phonenum' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required'
    ]);
    $data['firstname'] = $request->firstname;
    $data['middlename'] = $request->middlename;
    $data['surname'] = $request->surname;
    $data['address'] = $request->address;
    $data['username'] = $request->username;
    $data['phonenum'] = $request->phonenum;
    $data['email'] = $request->email;
    $data['password'] = Hash::make($request->password);

    $user = User::create($data);

    if(!$user){
        return redirect(route('registration'))->with("error", "Registration failed, try again.");

    }

    return redirect(route('login'))->with("success", "Registration Successful");
}
    function logout()
    {
        Auth::logout();  // Log out the current user

        // If you're using session, flush session data
        session()->invalidate();
        session()->regenerateToken();

        // Prevent caching of the previous page (no back button allowed)
        return redirect()->route('login')->with('noCache', true);
    }
}
