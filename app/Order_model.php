<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Order_model extends ModelSetting
{
    //
    protected $table = 'orders';
    public $timestamps = true;
}
