<?php

namespace App\Http\Controllers;

use App\Brand_model;
use App\Serie_model;
use Illuminate\Http\Request;

class Serie extends Controller
{
    //
    protected $model,$brand;
    public function __construct()
    {
        $this->model = new Serie_model();
        $this->brand = new Brand_model();
    }
    
    public function index(Request $res,$url){
        $where = array('brands.url'=>$url);
        $data = $this->model->eloquentjoin($where);
        $brand = $this->brand->getInfo()->toArray();
        $last_value = $this->brand->getInfo($where)->toArray();
        $last_value =  array_merge($last_value, $brand);
        $last_value = array_unique($last_value,SORT_REGULAR);
        return view('admin.serie',['series'=>$data,'brand'=>$last_value]);
    }
    public function insert(Request $res){
        $data = $res->except('_token');
        $data = $data + array('url'=>to_slug($data['name']));
        status($res,$this->model->create($data));
        return redirect($_SERVER['HTTP_REFERER']);
    }
    public function edit(Request $res){
        $where = $res->except('_token');
        $data = $this->model->where($where)->get();
        echo json_encode($data);
    }
    public function delete(Request $res,$id){
        status($res,$this->model->destroy($id));
        return redirect($_SERVER['HTTP_REFERER']);
    }
    public function update(Request $res,$id){
        $data = $res->except('_token');
        $data = $data + array('url'=>$data['name']);
        $update = $this->model->find($id);
        $update->name = $data['name'];
        $update->brand_id = $data['brand_id'];
        $update->url = $data['brand_id'];
        status($res,$update->save());
        return redirect($_SERVER['HTTP_REFERER']);
    }
}

