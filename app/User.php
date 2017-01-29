<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const ROLE_ADMIN    = 'admin';
    const ROLE_USER     = 'user';
    const ROLE_CURATOR  = 'curator';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function courses() {
        return $this->belongsToMany(Course::class);
    }

    public function hasAccessToCourse(Course $course) {
        return (bool)$this->courses()->find($course->id);
    }
}
