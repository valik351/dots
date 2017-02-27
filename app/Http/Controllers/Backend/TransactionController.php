<?php

namespace App\Http\Controllers\Backend;

use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function index(Request $request) {
        $transaction_attributes = (new Transaction())->getFillable();
        array_unshift($transaction_attributes, 'id');
        $transactions = Transaction::query();

        foreach ($transaction_attributes as $item) {
            $transactions->orWhere($item, 'like', '%' . $request->get('search', '') . '%');
        }
        
        return view('admin.transactions.index', [
            'transactions' => $transactions->orderBy('id', 'desc')->paginate(10),
            'transaction_attributes' => $transaction_attributes
        ]);
    }
}
