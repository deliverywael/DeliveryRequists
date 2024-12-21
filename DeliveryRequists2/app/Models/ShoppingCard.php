<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCard extends Model
{
    use HasFactory;


    protected $table = 'shopping_card'; // تحديد اسم الجدول
    protected $fillable = [
        'User_id', 'Product_id', 'Products_Number'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'User_id');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'Product_id');
    }
}
