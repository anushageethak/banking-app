<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class DepositController extends Controller
{
    //
    public function deposit(){
        return view('deposit');
    }
    public function depositSave(Request $request){
        $request->validate([
            'balance' => 'required|numeric|min:0.01',
        ]);
    
        $user = Auth::user();
    
        $user->balance += $request->input('balance');
        $user->save();
        
        $transaction = new Transaction([
            'user_id' => $user->id,
            'amount' => $user->balance,
            'type' => 'credit', // Assuming credit for deposit
            'user_balance_at_transaction' => $user->balance,
        ]);
        $transaction->save();
    
        return redirect()->route('home')->with('success', 'Balance deposited successfully.');

    }
   
    
}
