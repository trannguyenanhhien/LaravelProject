<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategory_model;
use App\Category_model;
use Illuminate\Support\Arr;

class Subcategory extends Controller
{
    protected $model,$category;
    public function __construct()
    {
        $this->model = new Subcategory_model();
        $this->category = new Category_model();
    }
    
    public function index(Request $res,$url){
        $where = array('category.url'=>$url);
        $data = $this->model->eloquentjoin($where);
        $category = $this->category->getInfo()->toArray();
        $last_value = $this->category->getInfo($where)->toArray();
        $last_value =  array_merge($last_value, $category);
        $last_value = array_unique($last_value,SORT_REGULAR);
        return view('admin.subcategory',['subcategory'=>$data,'category'=>$last_value]);
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
        $update->category_id = $data['category_id'];
        $update->url = $data['category_id'];
        status($res,$update->save());
        return redirect($_SERVER['HTTP_REFERER']);
    }
}
