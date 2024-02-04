<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransferController extends Controller
{
    public function transfer(){
        return view('transfer');
    }

    public function transferMoney(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'recipient_email' => 'required|email|exists:users,email',
        ]);

        $sender = Auth::user();

        $recipient = User::where('email', $request->input('recipient_email'))->first();
        
        if ($sender->balance >= $request->input('amount')) {
            
            $sender->balance -= $request->input('amount');
            $sender->save();
            
            $transaction = new Transaction([
                'user_id' => $sender->id,
                'amount' => $request->input('amount'),
                'recipient_email' => $request->input('recipient_email'),
                'type' => 'transfer',
                'user_balance_at_transaction' => $sender->balance,
            ]);
            $transaction->save();

            $recipient->balance += $request->input('amount');
            $recipient->save();

            return redirect()->route('home')->with('success', 'Money transferred successfully.');
        } else {
            return redirect()->route('home')->with('error', 'Insufficient balance.');
        }
    }

    //To show transaction statement// 
    
    public function showStatement(){
        $transactions = Transaction::latest()->paginate(10);
    return view('statement', compact('transactions'));

    }
}
