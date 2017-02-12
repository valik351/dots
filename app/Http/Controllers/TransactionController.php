<?php

namespace App\Http\Controllers;

use App\Transaction;
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
        $transaction = Transaction::findOrFail($data['order_id']);
        $transaction->fill($data);
        $transaction->save();
    }
}