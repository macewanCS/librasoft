<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['body'];

    public function plans() {
        return $this->hasMany(Plan::class);
    }

    public function goals()
    {
        return $this->hasMany(Goal::class);
    }

    public function addPlan(Plan $plan) {
        return $this->plans()->save($plan);
    }

    public function addGoal(Goal $goal) {
        return $this->goals()->save($goal);
    }


}
