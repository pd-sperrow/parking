<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'created_by', 'id');
    }
}
