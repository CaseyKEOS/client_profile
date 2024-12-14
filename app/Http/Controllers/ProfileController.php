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
            'cphonenum' => 'required',
            'cbirthday' => 'required',
            'notes' => 'required',
            'client_type_id' => 'required',
        ]);

        $clients=DB::table('clients')->insert([
            'cfirstname' =>$request->input('cfirstname'),
            'cmiddlename' =>$request->input('cmiddlename'),
            'csurname' =>$request->input('csurname'),
            'caddress' =>$request->input('caddress'),
            'cphonenum' =>$request->input('cphonenum'),
            'cbirthday' =>$request->input('cbirthday'),
            'notes' => $request->input('notes'),
            'client_type_id'=>$request->input('clientype'),
        ]);
        if(!$clients){
            return back()->with('error','not inserting');
        }

        return redirect(route('profile'))->with('message','Client Adding Successful');
    }

    public function index()
    {
        return view('profile');
    }
}
