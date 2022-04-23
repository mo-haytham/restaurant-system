<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Favorite extends Pivot
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'item_id',
    ];
    public $incrementing = true;
    public $timestamps = false;
}
