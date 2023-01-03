<?php

namespace App\Http\Controllers;


use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\Spam;
use App\Http\Requests\SpamRequest;
use App\Services\SpamService;
class SpamController extends Controller
{
    //Reported Spam
    public function index(){
        $report = DB::table('spam')->where('State', '!=', 'CLOSED')->get();
        return Inertia::render('Spam/Index' , [  'all_report'=>$report  ]);

        // For JSON dd($report);
    }


    //Report new spam
    public function  new(){
        return Inertia::render('Spam/New', []);
    }


    //Spam Creation Request
    public function create(Request $request){
        $source = $request->source;
        $message = $request->message;
        $state = $request->state;
        $report_type = $request->report_type;
        $report_id = Str::random(32);
        $user_id= Auth::user()->id;
        $referenceResourceType = $request->referenceResourceType;


        // Save spam
        $spam_store = new SpamService( $source, $message,$state,$report_type,$report_id,$report_id, $user_id, $referenceResourceType );
        $save = $spam_store->store();


        // Check Results
        if($save == true){ return redirect('/spam');
        }else{ dd('False'); }
    }


    //Update Spam Report
    public function update(Request $request,$api){

        if($request->value == 1){
            $update = DB::table('spam') ->where('report_id', $api)->update(['State' => 'Block',]);
            return redirect('/spam');
        }else{
            $update = DB::table('spam') ->where('report_id', $api)->update(['State' => 'CLOSED',]);
            return redirect('/spam');
        }


    }
}
