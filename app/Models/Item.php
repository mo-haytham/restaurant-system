<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'category_id',
        'name',
        'price',
        'image_url',
        'status',
        'created_at',
        'updated_at'
    ];

    public function favorites()
    {
        return $this->belongsToMany(User::class)->using(Favorite::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function description()
    {
        return $this->hasOne(ItemDescription::class);
    }
    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
