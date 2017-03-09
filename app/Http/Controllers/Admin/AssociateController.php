<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Associate;
use App\Traits\Common;
use App\Traits\Universal;

class AssociateController extends Controller
{
    protected $paginate = 2;
    use Common,Universal;

    public function index()
    {
        $associates = Associate::withTrashed()->paginate($this->paginate);

        return view('admin.associates.index', compact('associates'));
    }

    public function getAssociate($id)
    {
        $associate = Associate::withTrashed()->findOrFail($id);

        return view('admin.associates.view', compact('associate'));
    }


    public function activate($id)
    {

        $activate = $this->activateUser($id,'App\Models\Associate');
        if($activate)
            return back()->with('success', 'Associate successfully activated.');
        return back()->with('error', 'Something went wrong.');

    }
    
    public function reject($id,$current_page)
    {
        $reject = $this->rejectUser($id,$current_page,'App\Models\Associate');
        if($reject)
            return redirect($reject);
        return back()->with('error', 'Something went wrong.');
    }


    public function download($id)
    {
        $associate = Associate::withTrashed()->find($id);
        $file = $associate->resume;
        $arr = explode('.',$file);

        $headers = array(
            'Content-Type: application/' . $arr[1],
        );

        return response()->download(public_path().'/uploads/associates/'.$file, $associate->name. '.' .$arr[1], $headers);
    }
}
