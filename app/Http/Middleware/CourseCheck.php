<?php

namespace App\Http\Middleware;

use App\Course;
use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class CourseCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $course = Course::findOrFail($request->course_id);
        if (!$course->users()
            ->where('users.id', Auth::user()->id)
            ->count()
        ) {
            return redirect(action('CourseController@buy', ['course_id' => $course->id]));
        }
        if (!Auth::user()->hasRole(User::ROLE_CURATOR)) {
            $requirements = $course->requiredCourses;
            $required = collect();
            foreach ($requirements as $requirement) {
                if (!$requirement->users()
                    ->where('users.id', Auth::user()->id)
                    ->where('completed', true)
                    ->count()
                ) {
                    $required->push($requirement);
                }
            }
            if ($required->isNotEmpty()) {
                return redirect(action('CourseController@required', ['id' => $course->id]))
                    ->with(['requirements' => $required]);
            }
        }
        return $next($request);
    }
}
