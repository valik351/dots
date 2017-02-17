<?php

namespace App\Http\Controllers;

use App\Course;
use App\Module;
use App\Transaction;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function __construct()
    {
        $this->middleware('course_check');
        $this->middleware('module_check')->only('show');
    }

    public function show(Request $request, $course_id, $module_id)
    {
        return view('module.show', [
            'module' => Module::findOrFail($module_id),
        ]);
    }

    public function required(Request $request, $module_id)
    {
        $required = $request->session()->get('requirements');
        if (!$required || $required->isEmpty()) {
            return redirect(action('ModuleController@show', [
                'course_id' => Module::findOrFail($module_id)->course_id,
                'module_id' => $module_id
            ]));
        }
        return view('module.required', ['modules' => $required]);
    }
}
