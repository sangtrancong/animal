<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table="product";
    use HasFactory;
    public function category(){
        return $this->hasOne('App\Models\Category','id','category_id');

    }
}
