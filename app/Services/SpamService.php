<?php

namespace App\Services;
use App\Models\Spam;
use Illuminate\Support\Facades\DB;

class SpamService
{

    public $source;
    public $message;
    public $state;
    public $report_type;
    public $report_id ;
    public $user_id;
    public $referenceResourceType;

    public function __construct($source, $message, $state, $report_type ,$report_id ,$user_id ,$referenceResourceType){

        $this->source = $source;
        $this->message = $message;
        $this->state = $state;
        $this->report_type = $report_type;
        $this->report_id = $report_id;
        $this->user_id = $user_id;
        $this->referenceResourceType = $referenceResourceType;
    }

    public function store(){

    try {
        //code...
      $store = new Spam;
      $store->source = $this->source;
      $store->message = $this->message;
      $store->state= $this->state;
      $store->report_type = $this->report_type;
      $store->report_id = $this->report_id;
      $store->user_id = $this->user_id;
      $store->referenceResourceType = $this->referenceResourceType;
      $store->save();

      return true;
    } catch (\Throwable $th) {
        //throw $th;
        return false;
    }


    }

}
