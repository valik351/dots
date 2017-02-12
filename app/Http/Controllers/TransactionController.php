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
        $liqpay = new \LiqPay(env('LIQPAY_PUBLIC_KEY'), env('LIQPAY_PRIVATE_KEY'));
        Log::info($data);
        if ($liqpay->cnb_signature($data) !== $request->signature) {
            Log::info($liqpay->cnb_signature($data));
            Log::info(base64_encode(sha1($private_key . json_encode($data) . $private_key, 1)));
            Log::info($request->signature);
            abort(403, 'Forbidden');
        }
        $transaction = Transaction::findOrFail($request->order_id);
        $transaction->fill($data);
        $transaction->save();
    }
}
