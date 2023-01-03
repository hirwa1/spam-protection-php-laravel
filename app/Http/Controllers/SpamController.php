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
        return Inertia::render('Spam/Index' , [    ]);
    }


    //Report new spam
    public function  new(){
        return Inertia::render('Spam/New', []);
    }


    //Spam Creation Request
    public function create(Request $request){
        $source = $request->source;
        $state = $request->state;
        $report_type = $request->report_type;
        $report_id = Str::random(32);
        $user_id= Auth::user()->id;
        $referenceResourceType = $request->referenceResourceType;


        // Save spam
        $spam_store = new SpamService( $source,$state,$report_type,$report_id,$report_id, $user_id, $referenceResourceType );
        $save = $spam_store->store();

        if($save == true){
            dd('True');
        }else{
            dd('False');
        }



    }
}
