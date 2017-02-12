<?php

namespace App\Http\Controllers;

use App\Course;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function callback(Request $request)
    {
        $private_key = env('LIQPAY_PRIVATE_KEY');
        if (base64_encode(sha1($private_key . $request->data . $private_key, 1)) !== $request->signature) {
            abort(403, 'Forbidden');
        }
        $data = json_decode(base64_decode($request->data), true);
        $order_id = explode('_', $data['order_id']);
        $transaction = Transaction::findOrFail($order_id[0]);

        $transaction->fill($data);
        $transaction->save();

        if ($transaction->isSuccessful()) {
            $user = User::findOrFail($order_id[array_search('user', $order_id) + 1]);
            $course = Course::findOrFail($order_id[array_search('course', $order_id) + 1]);
            $user->courses()->attach($course);
        }
    }
}