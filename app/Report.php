<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';
    protected $fillable = ['lapor_id','user_id','status','content'];
    // protected $connection = 'mysql';
}
