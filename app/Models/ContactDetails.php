<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactDetails extends Model
{
    protected  $table = 'contact_details';
    
    protected $fillable = [
        'phone',
        'address',
        'hours',
        'email',
        'facebook',
        'linkedin',
        'skype',
        'twitter',
        'google',
    ];
}
