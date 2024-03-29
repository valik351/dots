<?php

namespace App;

use App\Support\Exchange;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Course
 *
 * @property-read mixed $about_link
 * @property-read mixed $buy_link
 * @property-read mixed $link
 * @property-read mixed $price
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Module[] $modules
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $content
 * @property int $duration
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Course whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Course whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Course whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Course whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Course whereDuration($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Course whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Course whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Course wherePrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Course whereUpdatedAt($value)
 */
class Course extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'description', 'content', 'duration', 'price'];

    public function getAboutLinkAttribute()
    {
        return action('CourseController@about', ['course_id' => $this->id]);
    }

    public function getBuyLinkAttribute()
    {
        return action('CourseController@buy', ['course_id' => $this->id]);
    }

    public function getLinkAttribute()
    {
        return action('CourseController@show', ['course_id' => $this->id]);
    }

    public function getPriceAttribute()
    {
        return Exchange::rate() * $this->attributes['price'];
    }

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    public function requiredCourses()
    {
        return $this->belongsToMany(Course::class, 'course_requirements', 'course_id', 'required_course_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps()->withPivot('completed');
    }
}
