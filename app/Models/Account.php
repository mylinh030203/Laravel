<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    // $account ===....
    // $role = $account->getRole

    public function getRole(){
        return $this->hasOne(Role::class, 'id', 'role_id');
    }
}
