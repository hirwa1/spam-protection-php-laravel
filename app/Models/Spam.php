<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spam extends Model
{
    use HasFactory;

    protected $fillable = [
        'source',
        'state',
        'report_type',
        'report_id',
        'user_id',
        'referenceResourceType',
        'created_at',
        'updated_at',
        'message'
   ];
}
