<?php

namespace App\Http\Controllers;

use App\Course;
use App\Problem;
use App\Solution;
use App\Transaction;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    public function show(Request $request, $course_id, $module_id, $solution_id) {
        return view('solution.show', ['solution' => Solution::findOrFail($solution_id) ]);
    }
}
