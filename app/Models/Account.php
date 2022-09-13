<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    //Đăt tên table mà Model muốn connect
    protected $table = 'accounts';
    protected $fillable = ['username', 'password'];
}
