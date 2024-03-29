<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Module
 *
 * @property-read mixed $link
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Problem[] $problems
 * @mixin \Eloquent
 * @property int $id
 * @property int $course_id
 * @property string $name
 * @property string $description
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Module whereCourseId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Module whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Module whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Module whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Module whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Module whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Module whereUpdatedAt($value)
 */
class Module extends Model
{
    protected $fillable = ['course_id', 'name', 'description'];

    public function getLinkAttribute()
    {
        return action('ModuleController@show', [
            'module_id' => $this->id,
            'course_id' => \Request::route()->parameters()['course_id']
        ]);
    }

    public function problems()
    {
        return $this->belongsToMany(Problem::class)->withPivot('display_id');
    }

    public function programmingLanguages()
    {
        return $this->belongsToMany(ProgrammingLanguage::class);
    }

    public function requiredModules()
    {
        return $this->belongsToMany(Course::class, 'module_requirements', 'module_id', 'required_module_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps()->withPivot('completed');
    }
}
