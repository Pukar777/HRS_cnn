<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'type',
        'comments',
        'account_id'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'transaction_users', 'user_id', 'transaction_id');
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
