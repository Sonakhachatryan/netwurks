<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Customer extends Authenticatable
{

    use Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'organization',
        'email',
        'password',
        'phone',
        'expertise_area',
        'objective',
        'outline_of_topic',
        'industry_id',
        'desc_file',
        'deleted_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['deleted_at'];
    
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
