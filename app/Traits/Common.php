<?php

namespace App\Traits;

use Mail;
use Hash;
use Illuminate\Support\Facades\Storage;

trait Common
{
    public function passwordGenerator()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function activateUser($id, $model)
    {
        $user = $model::withTrashed()->findOrFail($id);

        $password = $this->passwordGenerator();

        try {
            Mail::send('emails.activation', ['title' => 'Activation', 'password' => $password, 'email' => $user->email], function ($message) {
                $message->from('petersonben45@gmail.com', 'Netwurxs');

                $message->to('petersonben45@gmail.com');

            });

            $user->update(['password' => bcrypt($password), 'deleted_at' => NULL]);

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function rejectUser($id, $current_page, $model)
    {
        $user = $model::withTrashed()->findOrFail($id);

        try {
            $mail = Mail::send('emails.reject', [], function ($message) {
                $message->from('petersonben45@gmail.com', 'Netwurxs');

                $message->to('petersonben45@gmail.com');

            });
            $user->forceDelete();
            if ($model == 'App\Models\Customer') {
                $url = 'uploads/customers/' . $user->desc_file;
                $rdrURL = 'admin/customers';
            }
            if ($model == 'App\Models\Associate') {
                $url = 'uploads/associates/' . $user->resume;
                $rdrURL = 'admin/associates';
            }
            Storage::delete($url);

            if (isset($current_page)) {
                $rdrURL .= '?page=' . $this->getCurrentPage($current_page, $model);
            }
            return $rdrURL;

        } catch (\Exception $e) {
            return false;
        }

    }


}