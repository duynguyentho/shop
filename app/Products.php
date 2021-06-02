<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    protected $table="products";
    protected $fillable = ['id', 'name','price','discount','description','special','image'];
}
