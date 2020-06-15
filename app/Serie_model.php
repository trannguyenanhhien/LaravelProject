<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie_model extends ModelSetting
{
    //
    protected $table = 'series';
    protected $fillable = ['name','url','brand_id'];
    public $timestamps = false;
    public function brand()
    {
        return $this->belongsTo('App\Brand_model');
    }
    public function eloquentjoin($where){
        return $this->leftJoin('brands', 'brands.id', '=', 'series.brand_id')
        ->where($where)
        ->select('series.*','brands.name as name_brand')->get();
    }
}
