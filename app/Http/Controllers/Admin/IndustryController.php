<?php

namespace App\Http\Controllers\Admin;

use App\Models\Industry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Traits\Common;
use App\Traits\Universal;

class IndustryController extends Controller
{
    use Universal;
    protected $paginate = 10;
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

        Industry::create(['name' => $request->name]);
        
        Session::flash('success','Industry created success.');
        
        return redirect('admin/industries');
    }

    public function remove($id,$current_page)
    {

        Industry::destroy($id);

        Session::flash('success', 'Industry deleted!');

        $rdrURL = 'admin/industries';
        if(isset($current_page)) {
            $rdrURL .= '?page=' . $this->getCurrentPage($current_page,'App\Models\Industry');
        }
        return redirect($rdrURL);

        
    }
}
