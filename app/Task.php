<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body', 'date', 'owner', 'lead', 'collaborators', 'status', 'success', 'action_id'
    ];

    public function action()
    {
        return $this->belongsTo(Action::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function addNote(Note $note)
    {
        return $this->notes()->save($note);
    }

}
