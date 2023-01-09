<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'price', 'created_by'];

    public function vehicles()
    {
        return $this->hasMany('App\Vehicle', 'category_id', 'id');
    }

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
