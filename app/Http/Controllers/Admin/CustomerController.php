<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Mail;

class CustomerController extends Controller
{
    protected $paginate = 15;

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
        $customer = Customer::withTrashed()->findOrFail($id);

        $associate = Customer::where('email',$customer->email)->first();

        $bool = true;
        while($bool)
        {
            $password = $this->passwordGenerator();
            if(!Hash::check($password, $associate->password))
                $bool = false;
        }

        $password = $this->passwordGenerator();
        try {
             Mail::send('emails.activation', ['title' => 'Activation', 'password' => $password, 'email' => $customer->email], function ($message) {
                $message->from('petersonben45@gmail.com', 'Netwurxs');

                $message->to('petersonben45@gmail.com');

            });

            $customer->update(['password' => bcrypt($password), 'deleted_at' => NULL]);

            return back()->with('success', 'Customer successfully activated.');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong.');
        }


    }

    function passwordGenerator()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function reject($id)
    {
        $customer = Customer::withTrashed()->findOrFail($id);

        try {
            $mail = Mail::send('emails.reject', [], function ($message) {
                $message->from('petersonben45@gmail.com', 'Netwurxs');

                $message->to('petersonben45@gmail.com');

            });
            $customer->forceDelete();
            return back()->with('success', 'Customer successfully deleted.');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong.');
        }


    }
}
