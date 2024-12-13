<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
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
            return redirect(route('user'))->with("error", "Registration failed, try again.");

        }

        return redirect('/user')->with("success", "Registration Successful");
    }

    public function index()
    {
        $users = DB::table('users')->select('id','username','email')->get();

        return view('user')->with('users', $users);
    }

    public function update(Request $request, $id){}

    public function destroy($id){
        $user = User::find($id);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'email'=> ['required','email',Rule::unique('users', 'email')],
            'username'=> ['required','min:4'],
            'password'=>['required','min:8'],
        ]);
    }
}
