<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Feedback_model extends ModelSetting
{
    protected $table = 'feedback';
    public $fillable = ['content','user_id','product_id'];
    public $timestamps = true;

    public function comment($where=null){
        return $feedback = DB::table('feedback')
        ->join('users', 'users.id', '=', 'feedback.user_id')
        ->where($where)
        ->select('feedback.*','users.name as name','users.image as image')
        ->get();
    }
}
