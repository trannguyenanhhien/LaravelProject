<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Order_detail_model extends ModelSetting
{
    //
    protected $table = 'order_detail';
    public $timestamps = true;
    public function detail($id){
        return DB::table('order_detail')->where('order_id','=',$id)
        ->join('product', 'product.id', '=', 'order_detail.product_id')
        ->join('orders', 'orders.id', '=', 'order_detail.order_id')
        ->select('order_detail.*','product.name as product_name','orders.status as status','orders.total as total')->get();
    }
    public function statisticsWithCategory(){
        return DB::table('order_detail')
        ->join('product','order_detail.product_id','=','product.id')
        ->join('subcategory','subcategory.id','=','product.subcategory_id')
        ->join('category','category.id','=','subcategory.category_id')
        ->groupBy(DB::raw("category.name"))
        ->select(DB::raw('SUM(order_detail.price*qty) as DoanhThu,category.name'))->orderByRaw('DoanhThu DESC')->get();
    }
    
}
