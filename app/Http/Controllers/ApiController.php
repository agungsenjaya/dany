<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Lapor;
use App\Report;
use Auth;

class ApiController extends Controller
{
    public function lapor() {
        return Lapor::all();
    }
}
