<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_cost',
        'orders'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
