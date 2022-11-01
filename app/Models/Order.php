<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function getStt(){
        return $this->hasOne(Status::class, 'id', 'stt_id');
    }

    public function getUser(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getDetailOrders(){
        return $this->hasMany(DetailOrder::class, 'order_id');
    }
}
