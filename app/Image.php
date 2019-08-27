<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'user_images';
    protected $guarded = [];

    public function user_image()
    {
        return $this->belongsTo(User::class);
    }
}
