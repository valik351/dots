<?php

namespace App\Http\Controllers;

use App\Course;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function show(Request $request, $course_id)
    {
        return view('course.show', ['course' => Course::findOrFail($course_id)]);
    }

    public function about(Request $request, $course_id)
    {
        return view('course.about', ['course' => Course::findOrFail($course_id)]);
    }

    public function buy(Request $request, $course_id)
    {
        $liqpay = new \LiqPay(env('LIQPAY_PUBLIC_KEY'), env('LIQPAY_PRIVATE_KEY'));
        $course = Course::findOrFail($course_id);

        $transaction = new Transaction();
        $transaction->save();

        return view('course.buy', [
            'course' => $course,
            'pay_button_html' => $liqpay->cnb_form([
                'action' => 'pay',
                'sandbox' => '1',
                'amount' => $course->price,
                'currency' => 'UAH',
                'description' => $course->name,
                'order_id' => implode('_', [$transaction->id, 'course', $course_id, 'user', Auth::user()->id, 'time', time()]),
                'version' => '3',
                'server_url' => action('TransactionController@callback'),
                'result_url' => action('TransactionController@result', ['id' => $transaction->id]),
            ])
        ]);
    }
}
