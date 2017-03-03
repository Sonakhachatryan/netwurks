<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class AdminComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        if (auth()->guard('admin')->check()) 
        {
            $admin = auth()->guard('admin')->user();
            $view->with('admin', $admin);
        }
    }
}