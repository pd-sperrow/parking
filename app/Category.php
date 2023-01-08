<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function vehicles()
    {
        return $this->hasMany('App\Vehicle', 'category_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'created_by', 'id');
    }
}
