<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Eloquent;

class Category_model extends ModelSetting
{
    //
    protected $table = 'category';
    public $timestamps = false;
    public function subcategory()
    {
        return $this->HasMany('App\Subcategory_model','category_id');
    }
}
