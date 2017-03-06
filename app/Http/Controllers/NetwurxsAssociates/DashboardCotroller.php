<?php

namespace App\Http\Controllers\NetwurxsAssociates;

use Illuminate\Http\Request;
use App\Http\Middleware\UserMiddleware;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('associate.dashboard');
    }
}
