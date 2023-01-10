<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Park extends Model
{
    protected $fillable = ['vehicle_id', 'slot_id', 'customer_name', 'parking_time', 'charge', 'recived_by'];
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

    protected static function boot()
    {
        parent::boot();
        static::creating(function($model)
        {
            $model->recived_by = auth()->id();
        });
    }
}
