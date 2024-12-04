<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stores extends Model
{
    use HasFactory;

    protected $primaryKey = 'Store_id'; // تحديد مفتاح الجدول الرئيسي
    protected $fillable = ['StoreCategory'];

    public function products() {
        return $this->hasMany(Product::class);
    }
}
