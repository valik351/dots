<?php

namespace App\Http\Controllers;

use App\Course;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function callback(Request $request)
    {
        $private_key = env('LIQPAY_PRIVATE_KEY');
        if (base64_encode(sha1($private_key . $request->data . $private_key, 1)) !== $request->signature) {
            abort(403, 'Forbidden');
        }
        $data = json_decode(base64_decode($request->data), true);
        $order_id = Transaction::getOrderIdData($data['order_id']);
        $transaction = Transaction::findOrFail($order_id['id']);

        $transaction->fill($data);
        $transaction->save();

        if ($transaction->isSuccessful()) {
            $user = User::findOrFail($order_id['user_id']);
            $course = Course::findOrFail($order_id['course_id']);
            $user->courses()->attach($course);
            foreach ($course->modules as $module) {
                $user->modules()->attach($module);
            }
        }
    }

    public function result(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $order_data = Transaction::getOrderIdData($transaction->order_id);
        if($order_data['user_id'] != Auth::user()->id) {
            abort(403, 'Forbidden');
        }
        return view('transaction.result', ['transaction' => $transaction, 'course' => Course::findOrFail($order_data['course_id'])]);
    }
}