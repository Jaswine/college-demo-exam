<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'image_path', 'category', 'price'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
