<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner_model;
use Illuminate\Support\Facades\Storage;

class Banner extends Controller
{
    public function __construct()
    {
        $this->model = new Banner_model();
    }
    
    public function index(){
        $data = $this->model->getInfo();
        return view('admin.banner',['banner'=>$data]);
    }
    public function insert(Request $res){
        $data = $res->except('_token','img');
        $file = $res->file('img');
        if($file->store('uploads')){
            $data += array('url'=>$res->root().'/storage/'.$file->store('uploads'));
        }
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
        $data = $this->model->getInfo($where);
        $str = explode('/',$data[0]->url);
        status($res,unlink(storage_path('app/public/uploads/'.$str[5])) && $this->model->deleteInfo($where));
        return redirect($_SERVER['HTTP_REFERER']);
    }
    public function update(Request $res,$id){
        $where = array('id'=>$id);
        $data = $res->except('_token','img');
        $file = $res->file('img');
        $check = $this->model->getInfo($where);
        if($res->has('img')){
            $data += array('url'=>$file->store('uploads'));
            Storage::delete($check[0]->url);
        }else{
            $data += array('url'=>$check[0]->url);
        }
        status($res,$this->model->updateInfo($where,$data));
        return redirect($_SERVER['HTTP_REFERER']);
    }
}
