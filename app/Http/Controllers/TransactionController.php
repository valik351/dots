<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{
    public function callback(Request $request) {
        Log::info(print_r($request, true));
        $transaction = Transaction::findOrFail($request->order_id);
        $transaction->fill($request->all());
        $transaction->save();
    }
}
