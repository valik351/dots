<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{
    public function callback(Request $request) {
        Log::info(print_r($request->all(), true));
        $liqpay = new \LiqPay(env('LIQPAY_PUBLIC_KEY'), env('LIQPAY_PRIVATE_KEY'));
        $data = json_decode(base64_decode($request->data), true);
        if($liqpay->cnb_signature($data) !== $request->signature) {
            abort(403, 'Forbidden');
        }
        $transaction = Transaction::findOrFail($request->order_id);
        $transaction->fill($data);
        $transaction->save();
    }
}
