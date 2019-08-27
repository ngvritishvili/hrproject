<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['title', 'description', 'user_id'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
