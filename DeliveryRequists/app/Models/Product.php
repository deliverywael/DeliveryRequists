<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'Product_Name', 'Product_Quantity', 'Product_Photo',
        'Product_Price', 'Store_id'
    ];

    public function store() {
        return $this->belongsTo(Stores::class);
    }

    public function orders() {
        return $this->belongsToMany(Order::class)->withPivot('Product_Quantity');
    }
}
