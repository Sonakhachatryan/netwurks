<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class UserComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        if (auth()->guard('customer')->check())
        {
            $customer = auth()->guard('customer')->user();
            $view->with(['customer'=> $customer,'guard' => 'customer']);
        }
        
        if (auth()->guard('associate')->check())
        {
            $customer = auth()->guard('associate')->user();
            $view->with(['associate'=> $customer,'guard' => 'associate']);
        }

        $view->with(['guard' => 'associate']);
    }
}