<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;

    protected $table = 'favourite'; // تحديد اسم الجدول
    protected $fillable = [
        'User_id', 'Product_id'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'User_id');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'Product_id');
    }
}
