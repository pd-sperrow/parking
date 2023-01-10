<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    protected $fillable = ['name', 'capacity', 'created_by'];

    public function user()
    {
        return $this->belongsTo('App\User', 'created_by', 'id');
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function($model)
        {
            $model->created_by = auth()->id();
        });
    }
}
