<?php

namespace App\Http\Controllers;


use App\Product_model;
use App\Serie_model;
use Illuminate\Http\Request;
use DateTime;
use App\Subcategory_model;
class Products extends Controller
{
    public function __construct()
    {
        $this->model = new Product_model();
    }
    public function index(){
        $data = $this->model->getfullInfo();
        return view('admin.product',['product'=>$data]);
    }
    public function new(){
        return view('admin.newproduct',['method'=>'insert']);
    }
    public function loadsub(Request $res, Subcategory_model $model)
    {
        $where = $res->except('_token');
        $data = $model->where($where)->get()->toArray();
        $option="";
        
        for($i=0;$i<count($data);$i++)
        {
            $option=$option."<option  value='".$data[$i]['id']."'>".$data[$i]['name']."</option>";
        }
        echo $option;
    }
    public function loadser(Request $res, Serie_model $model)
    {
        $where = $res->except('_token');
        $data = $model->where($where)->get()->toArray();
        $option="";
        
        for($i=0;$i<count($data);$i++)
        {
            $option=$option."<option  value='".$data[$i]['id']."'>".$data[$i]['name']."</option>";
        }
        echo $option;
    }
    public function edit($id,Subcategory_model $Submodel){
        $where = array('product.id'=>$id);
        $data = $this->model->product_edit($where);
        return view('admin.newproduct',['products'=>$data[0]]);
    }
    public function insert(Request $res){
        $data = $res->except('description', 'img', 'files', '_token','category_id','brand_id');
        $img_link = $res->root()."/storage/";
        if ($res->has('img')) {
            $file = $res->img;
            $img_link=$img_link.$file[0]->store('uploads');
            for ($i = 1; $i < count($file); $i++) {
                if ($file[$i]->store('uploads')) {
                    $img_link = $img_link. "&" . $file[$i]->store('uploads') ;
                }
            }
        }
        $data = $data + array(
            'image' => $img_link,
            'url' => '/products/'.to_slug($res['name']),
            'description' => $this->parse_base64($res->description)
        );
        status($res, $this->model->insertInfo($data));
        return redirect('admin/product');
    }
    public function delete(Request $res,$id){
        $where = array('id'=>$id);
        status($res,$this->model->deleteInfo($where));
        return redirect('admin/product');
         
    }
    public function update(Request $res,$id){
        $where = array('id'=>$id);
        $data = $res->except('description', 'img', 'files', '_token','category_id','brand_id');
        $img_link = $res->root()."/storage/";
        if ($res->has('img')) {
            $file = $res->img;
            $img_link=$img_link.$file[0]->store('uploads');
            for ($i = 1; $i < count($file); $i++) {
                if ($file[$i]->store('uploads')) {
                    $img_link = $img_link. "&" . $file[$i]->store('uploads') ;
                }
            }
            $data = $data + array('image' => $img_link,);
        }
        $data = $data + array(
            'url' => '/products/'.to_slug($res['name']),
            'description' => $this->parse_base64($res->description,$res)
        );
        status($res,$this->model->updateInfo($where,$data));
        return redirect('admin/product');
    }

    function parse_base64($txt,$res)
    {
        $dom = new \DomDocument();
        $dom->loadHtml('<?xml encoding="utf-8" ?>' . $txt, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $k => $img) {
            $data = $img->getAttribute('src');
            if(strpos($data,'uploads')==false){
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $data = base64_decode($data);
                $image_name = "/storage/uploads/" . time() . $k . '.png';
                $path = public_path() . $image_name;
                file_put_contents($path, $data);
                $img->removeAttribute('src');
                $img->setAttribute('src', $res->root().'/'.$image_name);
            }
        }
        return $dom->saveHTML();
    }
}
