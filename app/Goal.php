<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['body'];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function objectives()
    {
        return $this->hasMany(Objective::class);
    }

}
