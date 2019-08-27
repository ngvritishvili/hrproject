<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $mappingProperties = array(
        'name' => [
            'type' => 'text',
            "analyzer" => "standard",
        ],
        'email' => [
            'type' => 'text',
            "analyzer" => "standard",
        ],
    );



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function events()
    {
        return $this->hasMany(Task::class);
    }

    public function news()
    {
        return $this->hasMany(News::class)->orderBy('created_at', 'desc');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class)->orderBy('created_at', 'desc');
    }

    public function drive_links()
    {
        return $this->hasMany(Drive::class);
    }

}
