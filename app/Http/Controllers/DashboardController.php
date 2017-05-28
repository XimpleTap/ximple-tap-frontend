<?php
/**
 * User: Cater
 * Date: 5/09/2017
 */
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;

class DashboardController extends Controller {

    public function Dashboardrecords($id,$datefrom,$dateto) {
    
        $record = DB::select('CALL GET_DASHBOARD_DETAILS(?,?,?)', array($id,$datefrom,$dateto));

        return response()->json($record);
    }

    public function Bargraph($id,$datefrom,$dateto){

       $record = DB::select('CALL GET_GRAPH_DETAILS(?,?,?)', array($id,$datefrom,$dateto));

        return response()->json($record);
     }

    public function index(){
        $user = new User();
        // TODO: $user_id = [please set user id here] REMOVE BELOW $user_id value after;
        $user_id = 1;
        $card_user = new CardUser();
        $cards = $card_user->fetch_cards($user_id);

        $user = new User();
        $user_data = $user->fetch_user_profile($user_id);

        return view('users.dashboard',['cards'=>$cards,'user_data'=>$user_data]);
    }
}
