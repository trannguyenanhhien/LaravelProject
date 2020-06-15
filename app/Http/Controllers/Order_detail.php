<?php

namespace App\Http\Controllers;

use App\Order_detail_model;
use Illuminate\Http\Request;

class Order_detail extends Controller
{
    //
    protected $model;
    public function __construct()
    {
        $this->model = new Order_detail_model();
    }
    public function detail(Request $res,$id){
        $data = $this->model->detail($id);
        return view('admin.order_detail',['order'=>$data]);
    }
    public function edit(Request $res){
        $where = $res->except('_token');
        $data = $this->model->edit($res->id);
        echo json_encode($data);
    }
    public function delete(Request $res,$id){
        status($res,$this->model->destroy($id));
        return redirect($_SERVER['HTTP_REFERER']);
    }
    public function update(Request $res,$id){
        $where = array('id'=>$id);
        $data = $res->except('_token','product');
        status($res,$this->model->updateInfo($where,$data));
        return redirect($_SERVER['HTTP_REFERER']);
    }
    public function statisticsWithCategory(Request $res){
        $data=$this->model->statisticsWithCategory();
        echo $data;
    }
  
}
