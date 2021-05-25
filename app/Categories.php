<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Categories extends Model
{
    //
    protected $table='categories'; 
    public $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = ['id', 'name', 'created_at', 'updated_at'];
    protected $guarded = array();
    public function getData()
    {
        return static::orderBy('created_at','desc')->get();
    }

    public function storeData($input)
    {
    	return static::create($input);
    }

    public function findData($id)
    {
        return static::find($id);
    }

    public function updateData($id, $input)
    {
        return static::find($id)->update($input);
    }

    public function deleteData($id)
    {
        return static::find($id)->delete();
    }
}
