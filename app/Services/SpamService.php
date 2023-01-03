<?php

namespace App\Services;
use App\Models\Spam;
use Illuminate\Support\Facades\DB;

class SpamService
{

    public $source;
    public $state;
    public $report_type;
    public $report_id ;
    public $user_id;
    public $referenceResourceType;

    public function __construct($source, $state, $report_type ,$report_id ,$user_id ,$referenceResourceType){

        $this->source = $source;
        $this->state = $state;
        $this->report_type = $report_type;
        $this->report_id = $report_id;
        $this->user_id = $user_id;
        $this->referenceResourceType = $referenceResourceType;
    }

    public function store(){

    }

}
