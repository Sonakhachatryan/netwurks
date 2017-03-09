<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class CustomerComposer
{
    public function compose(View $view)
    {
        if (auth()->guard('customer')->check())
        {
            $customer = auth()->guard('customer')->user();
            $view->with(['customer'=> $customer]);
        }
        
        if (auth()->guard('associate')->check())
        {
            $associate = auth()->guard('associate')->user();
            $view->with(['associate'=> $associate]);
        }
        
    }
}