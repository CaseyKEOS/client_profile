<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    function profiling(Request $request){

    }

    public function index()
    {
        $clients = DB::table('clients')->select('id','username','email')->get();

        return view('profile')->with('clients', $clients);
    }
}
