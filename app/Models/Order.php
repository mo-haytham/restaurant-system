<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_name',
        'user_address',
        'user_mobile',
        'notes',
        'admin_id',
        'status',
        'created_at',
        'updated_at'
    ];

    public function getDateFormattedAttribute()
    {
        return date("Y-m-d", strtotime($this->created_at));
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function address()
    {
        return $this->belongsTo(UserAddress::class);
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
