<?php

namespace App\Http\Controllers\Api;

use App\Course;
use App\Http\Controllers\Controller;
use App\Module;
use App\Problem;
use App\Solution;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;

class ProblemController extends Controller
{
    /**
     * Returns a problem's archive
     *
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function getArchive(Request $request, $id)
    {
        return response()->download(Problem::findOrFail($id)->getArchivePath());
    }

    public function show(Request $request, $course_id, $module_id, $problem_id) {
        return view('problem.show', [
            'problem'   => Problem::findOrFail($problem_id),
            'module'    => Module::findOrFail($module_id),
            'solutions' => \Auth::user()->solutions()
                ->where('module_id', $module_id)
                ->where('problem_id', $problem_id)
                ->paginate()
        ]);
    }

    public function submitSolution(Request $request, $course_id, $module_id, $problem_id)//@todo:refactor that shit!
    {
        $this->validate($request, Solution::getValidationRules($module_id));

        $solution = new Solution(['state' => Solution::STATE_NEW]);
        $solution->module_id = $module_id;
        $solution->owner()->associate(\Auth::id());
        $solution->problem()->associate($problem_id);
        $solution->programming_language()->associate($request->get('programming_language'));
        $solution->save();


        if ($request->hasFile('solution_code_file')) {
            $solution->saveCodeFile('solution_code_file');
        } else {
            \File::put($solution->sourceCodeFilePath(), $request->get('solution_code'));
        }

        return redirect()->action('SolutionController@show', [
            'module_id'   => $module_id,
            'course_id'   => $course_id,
            'solution_id' => $solution->id,
        ]);
    }
}
