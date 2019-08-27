<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drive extends Model
{
    protected $guarded = [];

    public function drive_owner()
    {
        return $this->belongsTo(User::class);
    }
}
