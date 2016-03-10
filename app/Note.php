<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'content',
        'user',
        'created_at',
        'updated_at'
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
