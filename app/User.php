<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
    // return $this->belongsTo('App\User', 'foreign_key');
    public function parks()
    {
        return $this->hasMany('App\Park', 'recived_by', 'id');
    }

    public function leaves()
    {
        return $this->hasMany('App\Park', 'leaved_by', 'id');
    }

    public function categories()
    {
        return $this->hasMany('App\Category', 'created_by', 'id');
    }

    public function vehicles()
    {
        return $this->hasMany('App\Category', 'created_by', 'id');
    }

    public function slots()
    {
        return $this->hasMany('App\Slot', 'created_by', 'id');
    }

}
