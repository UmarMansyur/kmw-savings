<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'members';
    protected $fillable = [
        'saving_category_id',
        'email',
        'password',
        'name',
        'role',
        'address',
        'gender',
        'phone',
        'thumbnail',
        'file'

    ];
    protected $hidden = [
        'password',
    ];

    public function saving_category() {
        return $this->hasMany(SavingCategory::class, 'id', 'saving_category_id');
    }

    public function savings() {
        return $this->belongsTo(Saving::class, 'id', 'member_id');
    }
}
