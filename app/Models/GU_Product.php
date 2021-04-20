<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GU_Product extends Model
{
    protected $table = 'gu_products';
    public function user()
    {
        return $this -> belongsTo('App\Models\User');
    }
}
