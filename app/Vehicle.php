<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = ['category_id', 'name', 'reg_no', 'created_by'];
    public function user()
    {
        return $this->belongsTo('App\User', 'created_by', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
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
