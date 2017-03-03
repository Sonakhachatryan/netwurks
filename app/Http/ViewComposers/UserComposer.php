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
        if (auth()->guard('user')->check())
        {
            $user = auth()->guard('user')->user();
            $view->with('user', $user);
        }
    }
}