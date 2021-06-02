<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CateProduct extends Model
{
    //
    protected $table='product_category'; 
    public $primaryKey = 'id';
    protected $fillable = ['id', 'product_id', 'category_id'];

}
