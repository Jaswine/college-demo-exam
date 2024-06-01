<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'description', 
        'image_path', 
        'price',
        'category',
    ];
    
    public function users()
    {
        return $this->belongsToMany(User::class, 'product_users');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_products');
    }
}
