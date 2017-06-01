<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $user_type_id = Auth::user()->user_type_id;

        //$business_id = DB::select('SELECT business_id FROM users_businesses WHERE user_id = "'.$user_id.'"');
        //$id_parsed = $business_id[0]->business_id;

        $id_parsed = 1;

        if($user_type_id == 3 || $user_type_id == 4){

            return view('dashboard_home.dashboard',array('businessID' => $id_parsed , 'userID' => $user_id));
        
        }
        
    }


}
