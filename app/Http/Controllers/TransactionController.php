<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{
    public function callback(Request $request)
    {

        $private_key = env('LIQPAY_PRIVATE_KEY');
        $data = json_decode(base64_decode($request->data), true);
        Log::info($data);
        if (base64_encode(sha1($private_key . $request->data . $private_key, 1)) !== $request->signature) {
            abort(403, 'Forbidden');
        }
        $transaction = Transaction::findOrFail($request->order_id);
        $transaction->fill($data);
        Log::info($transaction);
        $transaction->save();
    }
}