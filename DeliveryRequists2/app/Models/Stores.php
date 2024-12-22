<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stores extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $fillable = ['StoreCategory'];

//    public function products() {
//        return $this->hasMany(Product::class);
//    }



    public function products() {
        return $this->hasMany(Product::class, 'Store_id');
    }

    public function users() {
        return $this->belongsToMany(User::class, 'stores_users', 'Store_id', 'User_id');
    }
}
