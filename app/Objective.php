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
    protected $fillable = ['body', 'goal_id'];

    public function goal()
    {
        return $this->belongsTo(Goal::class);
    }

    public function actions()
    {
        return $this->hasMany(Action::class);
    }

    public function addAction(Action $action) {
        return $this->actions()->save($action);
    }


}
