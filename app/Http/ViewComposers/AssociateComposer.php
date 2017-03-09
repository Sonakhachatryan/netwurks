<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class AssociateComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        if (auth()->guard('associate')->check())
        {
            $associate = auth()->guard('associate')->user();
            $view->with(['associate'=> $associate]);
        }

    }
}