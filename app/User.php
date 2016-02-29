<?php

namespace App;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Kodeine\Acl\Traits\HasRole;

class User extends Model implements AuthenticatableContract, CanResetPassword
{
    use \Illuminate\Auth\Authenticatable, \Illuminate\Auth\Passwords\CanResetPassword, HasRole;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'department',
        'permission',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'permission',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function teams()
    {
        return$this->belongsToMany(Team::class);
    }
}
