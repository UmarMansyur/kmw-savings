<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saving extends Model
{
    use HasFactory;
    protected $table = 'savings';
    protected $fillable = [
        'member_id',
        'saldo',
        'debit'
    ];

    public function member() {
        return $this->hasMany(Member::class, 'id', 'member_id');
    }
}
