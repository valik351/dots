<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function callback(Request $request) {
        $transaction = Transaction::findOrFail($request->order_id);
        $transaction->fill($request->all());
        $transaction->save();
    }
}
