<?php

namespace App\Http\Middleware;

use App\Course;
use App\Module;
use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class ModuleCheck
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
        $module = Module::findOrFail($request->module_id);
        if (!Auth::user()->hasRole(User::ROLE_CURATOR)) {
            $required = collect();
            foreach ($module->requiredModules as $requirement) {
                if (!$requirement->users()
                    ->where('users.id', Auth::user()->id)
                    ->where('completed', true)
                    ->count()
                ) {
                    $required->push($requirement);
                }
            }
            if ($required->isNotEmpty()) {
                return redirect(action('ModuleController@required', ['course_id' => $module->course_id, 'module_id' => $module->id]))
                    ->with(['requirements' => $required]);
            }
        }
        return $next($request);
    }
}
