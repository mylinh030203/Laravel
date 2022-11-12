<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function getType(){
        return $this->hasOne(TypeProduct::class, 'id', 'type_id');
    }

    public function getListSize(){
        return $this->belongsToMany(Size::class, 'product_sizes', 'product_id', 'size_id');
    }
}
