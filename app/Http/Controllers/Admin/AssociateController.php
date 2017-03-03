<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Associate;
use Mail;

class AssociateController extends Controller
{
    protected $paginate = 15;

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
        $associate = Associate::withTrashed()->findOrFail($id);

        $password = $this->passwordGenerator();
        try {
            Mail::send('emails.activation', ['title' => 'Activation', 'password' => $password, 'email' => $associate->email], function ($message) {
                $message->from('petersonben45@gmail.com', 'Netwurxs');

                $message->to('petersonben45@gmail.com');

            });

            $associate->update(['password' => bcrypt($password), 'deleted_at' => NULL]);

            return back()->with('success', 'Associate successfully activated.');
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
