<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name', 'description', 'task_date','user_id'];

    public function user_events()
    {
        return $this->belongsTo(User::class);
    }
}
