<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Park extends Model
{
    public function reciever()
    {
        return $this->belongsTo('App\User', 'recived_by', 'id');
    }

    public function leaved()
    {
        return $this->belongsTo('App\User', 'leaved_by', 'id');
    }

    public function vehicle()
    {
        return $this->belongsTo('App\Vehicle', 'vehicle_id', 'id');
    }

    public function slot()
    {
        return $this->belongsTo('App\Slot', 'slot_id', 'id');
    }
}
