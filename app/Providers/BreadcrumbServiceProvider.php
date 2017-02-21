<?php

namespace App\Providers;

use App\Course;
use App\Module;
use App\Problem;
use App\Solution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class BreadcrumbServiceProvider extends ServiceProvider
{

    public function boot(Request $request)
    {
        View::composer('*', function ($view) use ($request) {
            $crumbs = [];
            foreach ([
                         Course::class => 'course_id',
                         Module::class => 'module_id',
                         Problem::class => 'problem_id',
                         Solution::class => 'solution_id'
                     ] as $class => $value) {
                $v = $request->route($value);
                if ($v) {
                    $model = $class::findOrFail($v);
                    $crumbs[$model->link] = $model->name ?: $model->id;
                } else {
                    break;
                }
            }
            $view->with('crumbs', $crumbs);
        });
    }
}
