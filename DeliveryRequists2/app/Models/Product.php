<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name', 'product_quantity', 'product_photo',
        'product_price', 'Store_id'
    ];

    public function store() {
        return $this->belongsTo(Stores::class);
    }

    public function orders() {
        return $this->belongsToMany(Order::class)->withPivot('product_quantity');
    }
}
