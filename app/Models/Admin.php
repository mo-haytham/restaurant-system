<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'email',
        'mobile',
        'password',
        'image_url',
        'status',
        'created_at',
        'updated_at'
    ];
    protected $hidden = [
        'remember_token',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
