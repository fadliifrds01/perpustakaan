<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\TransactionModel;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function showIndexTransaction()
    {
        // dd(TransactionModel::with(['users','book'])->first());
        $transactions = TransactionModel::with(['user', 'book'])->get();

        return view('Admin.Transaction.indexTransaction', compact('transactions'));
    }
}
