<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Associate;
use App\Models\Customer;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:user', ['except' => 'logout']);
    }

    public function showLoginForm()
    {
        return view('index');
    }

    protected function guard()
    {
        return Auth::guard('user');
    }

    public function login(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required',
        ]);

        $customer = Customer::where('email',$request->email)->first();
        if($customer && $auth = Auth::guard('customer')->attempt(['email' => $request->email,'password' => $request->password])){
            return redirect('customer/dashboard');
        }

        $associate = Associate::where('email',$request->email)->first();
        if($associate && $auth = Auth::guard('associate')->attempt(['email' => $request->email,'password' => $request->password])){
            return redirect('associate/dashboard');
        }

        return back()->withErrors(['err' => 'Incorrect username or password']);
    }

    public function logout($guard)
    {
        Auth::guard($guard)->logout();

        return redirect('/');
    }
}
