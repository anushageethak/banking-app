<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'amount', 'type', 'recipient_email','user_balance_at_transaction'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    

}
