<?php

namespace App\Http\Controllers\Admin;

use App\Models\Industry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class IndustryController extends Controller
{
    protected $paginate = 15;
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $industries = Industry::orderBy('created_at','desc')->paginate($this->paginate);
        
        return view('admin.industries.index',compact('industries'));
    }

    public function create()
    {
        return view('admin.industries.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);

        Industry::create(['name',$request->name]);
        
        Session::flash('success','Industry created success.');
        
        return back();
    }
}
