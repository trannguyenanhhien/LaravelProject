<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Product_model extends ModelSetting
{
    //
    protected $table = 'product';
    public $timestamps = false;
    public function getfullInfo()
    {
        return DB::table('product')
            ->leftJoin('promotions', 'promotions.id', '=', 'product.promotion_id')
            ->join('series', 'series.id', '=', 'product.series_id')
            ->join('subcategory', 'subcategory.id', '=', 'product.subcategory_id')
            ->join('category','category.id','=','subcategory.category_id')
            ->select('product.*', 'promotions.name as promotion_name', 'subcategory.name as subcategory_name', 'series.name as series_name','subcategory.category_id as category_id')
            ->orderBy('id','desc')
            ->get();
    }
    public function product_edit($where)
    {
        return DB::table('product')
            ->leftJoin('promotions', 'promotions.id', '=', 'product.promotion_id')
            ->join('series', 'series.id', '=', 'product.series_id')
            ->join('subcategory', 'subcategory.id', '=', 'product.subcategory_id')
            ->where($where)
            ->select('product.*', 'promotions.name as promotion_name', 'subcategory.name as subcategory_name', 'series.name as series_name', 'series.brand_id as brand_id', 'subcategory.category_id as category_id')
            ->get();

    }
    public function product_detail($where)
    {
        return DB::table('product')
            ->leftjoin('promotions', 'promotions.id', '=', 'product.promotion_id')
            ->join('series', 'series.id', '=', 'product.series_id')
            ->join('brands','brands.id','=','series.brand_id')
            ->join('subcategory', 'subcategory.id', '=', 'product.subcategory_id')
            ->where($where)
            ->select('product.*', 'promotions.sale_present as promotion','brands.name as brand_name', 'subcategory.name as subcategory_name', 'series.name as series_name')
            ->get();
    }
    public function loaddata_lv1($category)
    {
        return DB::table('product')
            ->join('subcategory', 'subcategory.id', '=', 'product.subcategory_id')
            ->join('category', 'category.id', '=', 'subcategory.category_id')->where('category.url', $category)
            ->select('product.*')->get();
    }
    public function loadData_lv2($category_url, $sub)
    {
        if (strpos($sub, "price") !== false) {
            $sub = explode("-", $sub);
            if (count($sub) == 2) {
                return DB::table('product')->where('price', '>', $sub[1] * 1000000)
                ->join('subcategory', 'subcategory.id', '=', 'product.subcategory_id')
                ->join('category', 'category.id', '=', 'subcategory.category_id')->where('category.url', $category_url)
                ->select('product.*')
                ->get();
            } else {
                return DB::table('product')->where('price', '>', $sub[1] * 1000000)->where('price', '<', $sub[\count($sub) - 1] * 1000000)
                ->join('subcategory', 'subcategory.id', '=', 'product.subcategory_id')
                ->join('category', 'category.id', '=', 'subcategory.category_id')->where('category.url', $category_url)
                ->select('product.*')
                ->get();
            }
        } else {
            return DB::table('product')
                ->join('subcategory', 'subcategory.id', '=', 'product.subcategory_id')->where('subcategory.url', '=', $sub)
                ->join('category', 'category.id', '=', 'subcategory.category_id')->where('category.url', $category_url)
                ->select('product.*')->get();
        }
    }
    public function loadData_lv3($category_url, $subcategory_url, $brand_url)
    {
        return  $product = DB::table('product')
            ->join('series', 'series.id', '=', 'product.series_id')
            ->join('brands', 'brands.id', '=', 'series.brand_id')->where('brands.url', $brand_url)
            ->join('subcategory', 'subcategory.id', '=', 'product.subcategory_id')->where('subcategory.url', $subcategory_url)
            ->select('product.*')
            ->get();
    }
    public function search($res)
    {
        return DB::table('product')->where('name', 'like', "%" . $res->name . "%")->get();
    }
}
