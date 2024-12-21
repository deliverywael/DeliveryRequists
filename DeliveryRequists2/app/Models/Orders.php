<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $primaryKey = 'Order_id'; // تحديد المفتاح الرئيسي
    protected $fillable = [
        'User_id', 'Product_id', 'Status',
        'TotalCost', 'Payment'
    ];



    public function user() {
        return $this->belongsTo(User::class, 'User_id');
    }

    public function products() {
        return $this->belongsToMany(Product::class, 'Orders', 'Order_id', 'Product_id')->withPivot('quantity');
    }



}
