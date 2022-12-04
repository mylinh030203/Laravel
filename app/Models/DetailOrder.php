<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    use HasFactory;
    public function getProduct(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function getSize(){
        return $this->hasOne(Size::class, 'id', 'size_id');
    }
}
