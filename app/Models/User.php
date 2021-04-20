<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    public function gu_products()
    {
        return $this -> hasMany('App\Models\GU_Product');
    }
}
