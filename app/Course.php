<?php

namespace App;

use App\Support\Exchange;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    public function getAboutLinkAttribute() {
        return action('CourseController@about', ['id' => $this->id]);
    }

    public function getBuyLinkAttribute() {
        return action('CourseController@buy', ['id' => $this->id]);
    }

    public function getLinkAttribute() {
        return action('CourseController@show', ['id' => $this->id]);
    }

    public function getPriceAttribute() {
        return Exchange::rate() * $this->attributes['price'];
    }

    public function modules() {
        return $this->hasMany(Module::class);
    }
}
