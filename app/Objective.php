<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['body'];

    public function goal()
    {
        return $this->belongsTo(Goal::class);
    }

    public function actions()
    {
        return $this->hasMany(Action::class);
    }


}
