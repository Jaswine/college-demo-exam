<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'unique_numbers', 'delivered_at', 
        'fio', 'email', 'phone', 'address', 'payment_method'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_order');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_order');
    }
}
