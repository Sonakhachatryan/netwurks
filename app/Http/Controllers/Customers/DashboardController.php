<?php

namespace App\Http\Controllers\Customers;

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
        return view('customer.dashboard');
    }
}
