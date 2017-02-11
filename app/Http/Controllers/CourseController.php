<?php

namespace App\Http\Controllers;

use App\Course;
use App\Transaction;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function show(Request $request, $course_id) {
        return view('course.show', ['course' => Course::findOrFail($course_id) ]);
    }

    public function about(Request $request, $course_id) {
        return view('course.about', ['course' => Course::findOrFail($course_id) ]);
    }

    public function buy(Request $request, $course_id) {
        $liqpay = new \LiqPay('i85422102906', '6K7J4sRA5osDvZJExtAsbVdP3wORLhr4MqZei1jy');
        $course = Course::findOrFail($course_id);

        $transaction = new Transaction();
        $transaction->save();

        return view('course.buy', [
            'course' => $course,
            'pay_button_html' => $liqpay->cnb_form([
                'action'         => 'pay',
                'sandbox'        => '1',
                'amount'         => $course->price,
                'currency'       => 'UAH',
                'description'    => $course->name,
                'order_id'       => $transaction->id,
                'version'        => '3',
                'server_url'     => action('TransactionController@callback'),
            ])
        ]);
    }
}
