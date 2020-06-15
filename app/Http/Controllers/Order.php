<?php

namespace App\Http\Controllers;

use App\Order_model;
use App\Order_detail_model;
use Illuminate\Http\Request;
use DB;
class Order extends Controller
{
    //
    protected $model,$order_detail;
    public function __construct()
    {
        $this->model = new Order_model();
        $this->order_detail = new Order_detail_model();
    }
    
    public function index($status=null,Request $res){
        if(isset($status))
        {
            $data = $this->model->getInfo(array('status' => $status, ))->toArray();
        }else{
            $data = $this->model->getInfo();
        }
        $number =  array_count_values(array_column($this->model->getInfo()->toArray(),'status'));
        if(isset($number[0])){
            $status_2 = $number[0];
        }else{
            $status_2 = 0;
        }
        if(isset($number[1])){
            $status_1 = $number[1];
        }else{
            $status_1 = 0;
        }
        $count = array('status_1'=>$status_1,'status_2'=>$status_2);
        return view('admin.order',['order'=>$data,'count'=>$count]);
    }
    public function delete(Request $res,$id){
        status($res,$this->model->destroy($id)&&$this->order_detail->destroy($id));
        return redirect($_SERVER['HTTP_REFERER']);
    }
    public function update(Request $res,$id){
        $where = array('id'=>$id);
        $data = array('status'=>1);
        status($res,$this->model->updateInfo($where,$data));
        return redirect($_SERVER['HTTP_REFERER']);
    }
    public function statistics(){
        return view('admin.Statistial');
    }
    public function statisticsWithYear(Request $res){
        $data=DB::table('orders')->where(DB::raw("YEAR(created_at)"),'=',$res->year) ->groupBy(DB::raw("Month(created_at)"))->select(DB::raw('SUM(total) as DoanhThu,Month(created_at) as month'))->get();
        echo $data;
    }

}
