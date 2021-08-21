<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lapor extends Model
{
    protected $table = 'lapors';
    protected $dates = ['date'];
    protected $guarded = [];
    // protected $connection = 'mysql';
    public function user(){
        return $this->belongSto('App\User');
    }
}
