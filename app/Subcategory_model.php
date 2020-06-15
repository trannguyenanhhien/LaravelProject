<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory_model extends ModelSetting
{
    protected $table = 'subcategory';
    protected $fillable = ['name','url','category_id'];
    public $timestamps = false;
    public function category()
    {
        return $this->belongsTo('App\Category_model');
    }
    public function eloquentjoin($where){
        return $this->leftJoin('category', 'category.id', '=', 'subcategory.category_id')
        ->where($where)
        ->select('subcategory.*','category.name as name_category')->get();
    }
}
