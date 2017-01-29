<?php

namespace App\Http\Controllers;

use App\Course;
use App\Module;
use App\Transaction;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function show(Request $request, $id) {
        return view('module.show', ['module' => Module::findOrFail($id) ]);
    }
}
