<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner_model;
use App\Product_model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Feedback_model;

use Gloudemans\Shoppingcart\Facades\Cart;

class Home extends Controller
{
    protected $banner_model, $product,$dataSearch;
    public function __construct()
    {
        $this->banner_model = new Banner_model();
        $this->product = new Product_model();
    }
    public function index(Request $request)
    {
        $Laptop = [];
        $ManHinh = [];
        $TaiNghe = [];
        $GVN = [];
        $BanPhim = [];
        $banner = $this->banner_model->getInfo();
        $product = $this->product->getfullInfo();

        for ($i = 0; $i < count($product); $i++) {
            # code...
            switch ($product[$i]->category_id) {
                case 3:
                    array_push($Laptop, $product[$i]);
                    break;
                case 2:
                    array_push($GVN, $product[$i]);
                    break;
                case 13:
                    array_push($ManHinh, $product[$i]);
                    break;
                case 14:
                    array_push($BanPhim, $product[$i]);
                    break;
                case 17:
                    array_push($TaiNghe, $product[$i]);
                    break;
            }
        }

        $collection = collect($product)->paginate(4);
        $collectionLT = collect($Laptop)->paginate(4);
        $collectionBP = collect($BanPhim)->paginate(4);
        $collectionMH = collect($ManHinh)->paginate(4);
        $collectionGVN = collect($GVN)->paginate(4);
        $collectionTN = collect($TaiNghe)->paginate(4);

        // if ($request->ajax()) {
        //     return view('customer.layout.pagination', ['product' => $collection]);
        // }
        return view('customer.home', ['banner' => $banner, 'product' => $collection,'LapTop'=>$collectionLT,'ManHinh'=>$collectionMH,'BanPhim'=>$collectionBP,'TaiNghe'=>$collectionTN,'GVN'=>$collectionGVN]);
    }
    public function index1(Request $request,$idcategory)
    {
        $Laptop = [];
        $ManHinh = [];
        $TaiNghe = [];
        $GVN = [];
        $BanPhim = [];
        $banner = $this->banner_model->getInfo();
        $product = $this->product->getfullInfo();

        for ($i = 0; $i < count($product); $i++) {
            # code...
            switch ($product[$i]->category_id) {
                case 3:
                    array_push($Laptop, $product[$i]);
                    break;
                case 2:
                    array_push($GVN, $product[$i]);
                    break;
                case 13:
                    array_push($ManHinh, $product[$i]);
                    break;
                case 14:
                    array_push($BanPhim, $product[$i]);
                    break;
                case 17:
                    array_push($TaiNghe, $product[$i]);
                    break;
            }
        }

        $collection = collect($product)->paginate(4);
        $collectionLT = collect($Laptop)->paginate(4);
        $collectionBP = collect($BanPhim)->paginate(4);
        $collectionMH = collect($ManHinh)->paginate(4);
        $collectionGVN = collect($GVN)->paginate(4);
        $collectionTN = collect($TaiNghe)->paginate(4);

        if ($request->ajax()) {
            switch ($idcategory) {
                case 3:
                    return view('customer.layout.pagination', ['product' => $collectionLT]);
                    break;
                case 2:
                    return view('customer.layout.pagination', ['product' => $collectionGVN]);
                    break;
                case 13:
                    return view('customer.layout.pagination', ['product' => $collectionMH]);
                    break;
                case 14:
                    return view('customer.layout.pagination', ['product' => $collectionBP]);
                    break;
                case 17:
                    return view('customer.layout.pagination', ['product' => $collectionTN]);
                    break;
            }
        }
        return view('customer.home', ['banner' => $banner, 'product' => $collection,'LapTop'=>$collectionLT,'ManHinh'=>$collectionMH,'BanPhim'=>$collectionBP,'TaiNghe'=>$collectionTN,'GVN'=>$collectionGVN]);
    }
    public function detail(Request $request, Feedback_model $feedback)
    {
        $data = $this->product->product_detail(array('product.url' => '/' . $request->path()))->toArray();
        $comment = $feedback->comment(array('product_id' => $data[0]->id));
        return view('customer.detailproduct', ['product' => $data[0], 'comment' => $comment]);
    }

    public function loadData_lv3($category_url, $subcategory_url, $brand_url, Request $request)
    {
        $collection = collect($this->product->loadData_lv3($category_url, $subcategory_url, $brand_url))->paginate(12);
        return view('customer.listproduct', ['product' => $collection]);
    }

    public function loadData_lv2($category_url, $sub, Request $request)
    {

        $collection = collect($this->product->loadData_lv2($category_url, $sub))->paginate(12);
        return view('customer.listproduct', ['product' => $collection]);
    }
    public function loaddata_lv1($category, Request $request)
    {
        $collection = collect($this->product->loaddata_lv1($category))->paginate(12);
        return view('customer.listproduct', ['product' => $collection]);
    }
    public function searchAjax(Request $res)
    {

        if ($res->name != null) {
            $data = $this->product->search($res);
            echo $data;
        }
    }
    public function searchFirst(Request $res)
    {
        $data=$this->product->search($res);
        $collection = collect($data)->paginate(12);
            return view('customer.product', ['name'=>$res->name,'product' => $collection]);
    }
    public function search(Request $res)
    {
        
        $data=$this->product->search($res);
        $collection = collect($data)->paginate(12);
            return view('customer.layout.pagination', ['product' => $collection]);
    }

    public function addcart(Request $res)
    {
        $data = array(
            'id' => $res->id,
            'name' => $res->name,
            'qty' => $res->qty,
            'price' => $res->price,
            'weight' => 0,
            'options' => ['size' => $res->image]
        );
        if (Cart::add($data)) {
            $respone = array(
                'total_item' => Cart::count(),
                'total' => Cart::subtotal(),
                'product' => Cart::content(),
            );
            return $respone;
        }
    }
    public function viewcart()
    {
        return view('customer.viewcart');
    }

    public function removecart(Request $res)
    {
        if (Cart::remove($res->rowId)) { }
        $respone = array(
            'total_item' => Cart::count(),
            'total' => Cart::subtotal(),
            'product' => Cart::content(),
        );
        return $respone;
    }
    public function updatecart(Request $res)
    {
        if (Cart::update($res->rowId, $res->qty)) {
            $respone = array(
                'total_item' => Cart::count(),
                'total' => Cart::subtotal(),
                'product' => Cart::content(),
            );
            return $respone;
        }
    }
    public function checkout()
    {
        return view('customer.checkout');
    }
    public function city_api()
    {
        return $this->fetch_api('https://thongtindoanhnghiep.co/api/city');
    }
    public function country_api(Request $res)
    {
        return $this->fetch_api('https://thongtindoanhnghiep.co/api/city/' . $res->id . '/district');
    }
    public function fetch_api($url)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        return $response;
    }
}
