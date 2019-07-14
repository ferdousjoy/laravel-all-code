<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable=['product_name','product_price'];
    protected $dates = ['deleted_at'];
    function get_category_name()
    {
return $this->hasOne('App\category','id','category_id');
    }
}
