<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function about(Request $request, $id) {
        return view('course.about', ['course' => Course::findOrFail($id) ]);
    }
}
