<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavingCategory extends Model
{
    use HasFactory;
    protected $table = 'saving_categories';
    protected $fillable = [
        'name',
        'limit',
        'description'
    ];

    public function member() {
        return $this->belongsTo(Member::class, 'id', 'saving_category_id');
    }

}
