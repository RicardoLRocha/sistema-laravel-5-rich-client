<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    /*
    * muestra la página dashboard
    */
    public function getIndex()
    {
        return view("dashboard.dashboard");
    }

}
