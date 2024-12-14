<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function showAll(){
        $clients = Client::all();
        return view("profile",compact("clients"));
    }

    function storeClient(Request $request){
        $request->validate([
            'cfirstname' => 'required',
            'cmiddlename' => 'required',
            'csurname' => 'required',
            'caddress' => 'required',
            'cusername' => 'required',
            'cphonenum' => 'required',
        ]);

        DB::table('clients')->insert([
            'cfirstname' =>$request->input('firstname'),
            'cmiddlename' =>$request->input('middlename'),
            'csurname' =>$request->input('surname'),
            'caddress' =>$request->input('address'),
            'cusername' =>$request->input('username'),
            'cphonenum' =>$request->input('phonenum'),
            'created_at' =>now(),
            'updated_at'=>now(),
        ]);

        return redirect(route('profile'))->with('message','Client Adding Successful');
    }

    public function index()
    {
        return view('profile');
    }
}
