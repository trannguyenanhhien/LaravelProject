<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Eloquent;

class Eloquent_model extends ModelSetting
{
    protected $table = 'subcategory';

    public function category()
    {
        return $this->belongsTo('App\Category_model');
    }
}
