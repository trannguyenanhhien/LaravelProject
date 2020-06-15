<?php

namespace App\Http\Controllers;

use App\Promotion_model;
use Illuminate\Http\Request;

class Promotion extends Controller
{
    // protected $model,$res;
    public function __construct()
    {
        $this->model = new Promotion_model();
    }
    
    public function index(){
        $data = $this->model->getInfo();
        return view('admin.promotion',['promotion'=>$data]);
    }
    public function insert(Request $res){
        $data = $res->except('_token');
        status($res,$this->model->insertInfo($data));
        return redirect($_SERVER['HTTP_REFERER']);
    }
    public function edit(Request $res){
        $where = $res->except('_token');
        $data = $this->model->getInfo($where);
        echo json_encode($data);
    }
    public function delete($id,Request $res){
        $where = array('id'=>$id);
        status($res,$this->model->deleteInfo($where));
        return redirect($_SERVER['HTTP_REFERER']);
    }
    public function update(Request $res,$id){
        $where = array('id'=>$id);
        $data = $res->except('_token');
        status($res,$this->model->updateInfo($where,$data));
        return redirect($_SERVER['HTTP_REFERER']);
    }
}
