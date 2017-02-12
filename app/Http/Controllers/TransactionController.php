<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{
    public function callback(Request $request)
    {
        Log::info(print_r($request->all(), true));
        $private_key = env('LIQPAY_PRIVATE_KEY');

        if (base64_encode(sha1($private_key . $request->data . $private_key)) !== $request->signature) {
            abort(403, 'Forbidden');
        }
        Log::info(json_decode(base64_decode($request->data), true));
        $transaction = Transaction::findOrFail($request->order_id);
        $transaction->fill(json_decode(base64_decode($request->data), true));
        $transaction->save();
    }
}
