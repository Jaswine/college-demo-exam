<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oder extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'products',
        'user_id',

        'fio',
        'phone',
        'email',
        'address',
        'payment_data',

        'deliver_status',
        
        'created_at',
        'delivered_at',
    ];

    public function products() 
    {
        return $this->belongsToMany(Product::class, 'order_products');
    }

    public function users() 
    {
        return $this->belongsToMany(User::class, 'order_users');
    }
}
