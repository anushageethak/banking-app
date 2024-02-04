<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class WithdrawController extends Controller
{
    public function withdraw(){
        return view('withdraw');
    }
    public function withdrawSave(Request $request){
        $request->validate([
            'balance' => 'required|numeric|min:0.01',
        ]);
    
        $user = Auth::user();
    
        $user->balance -= $request->input('balance');
        $user->save();
        
        $transaction = new Transaction([
            'user_id' => $user->id,
            'amount' => $user->balance,
            'type' => 'debit', // Assuming credit for withdraw
            'user_balance_at_transaction' => $user->balance,

        ]);
        $transaction->save();
    
        return redirect()->route('home')->with('success', 'Balance withdraw successfully.');

    }
}
