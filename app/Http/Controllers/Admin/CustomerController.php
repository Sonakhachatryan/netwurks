<?php

namespace App\Http\Controllers\Admin;

use App\Models\Associate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Support\Facades\Storage;
use App\Traits\Common;
use App\Traits\Universal;

class CustomerController extends Controller
{
    protected $paginate = 2;
    use Common,Universal;

    public function index()
    {
        $customers = Customer::withTrashed()->with('industry')->paginate($this->paginate);

        return view('admin.customers.index', compact('customers'));
    }

    public function getCustomer($id)
    {
        $customer = Customer::withTrashed()->with('industry')->findOrFail($id);

        return view('admin.customers.view', compact('customer'));
    }


    public function activate($id)
    {
        $activate = $this->activateUser($id,'App\Models\Customer');
        if($activate)
            return back()->with('success', 'Customer successfully activated.');
        return back()->with('error', 'Something went wrong.');
    }

    public function reject($id,$current_page)
    {
        $reject = $this->rejectUser($id,$current_page,'App\Models\Customer');
        if($reject)
            return redirect($reject);
        return back()->with('error', 'Something went wrong.');
    }

    public function download($id)
    {
        $customer = Customer::withTrashed()->find($id);
        $file = $customer->desc_file;
        $arr = explode('.',$file);
        
        $headers = ['Content-Type: application/' . $arr[1]];
        
        return response()->download(public_path().'/uploads/customers/'.$file, $customer->name. '.' .$arr[1], $headers);
    }
}
