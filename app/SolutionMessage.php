<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\SolutionMessage
 *
 * @property-read \App\Solution $solution
 * @property-read \App\User $user
 * @mixin \Eloquent
 */
class SolutionMessage extends Model
{

    public static function getValidationRules()
    {
        return ['text' => 'required|max:255'];
    }

    public function solution()
    {
        return $this->hasOne(Solution::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
