<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Employe extends Authenticatable
{
    use HasFactory;
    protected $table = 'employes';
    protected $fillable = [
        'email',
        'password',
        'name',
        'role_id',
        'address',
        'gender',
        'phone',
        'thumbnail'
    ];
    protected $hidden = [
        'password',
    ];
    public function role() {
        return $this->hasMany(Role::class, 'id', 'role_id');
    }
}
