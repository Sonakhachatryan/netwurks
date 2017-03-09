<?php

namespace App\Traits;

trait Universal
{
    public function getCurrentPage($current_page,$model)
    {
        $count = $model::all()->count();

        $count = ceil($count / $this->paginate);
        if ($current_page > $count) {
            $current_page = $count;
        }

        return $current_page;
    }
}


