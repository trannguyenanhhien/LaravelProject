<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category_model;
use App\Subcategory_model;

class Eloquent extends Controller
{
    public function test(){
        $model = new Category_model();
        $data = $model->with('subcategory')->get()->toArray();
        echo "<pre>";
        print_r ($data);
        echo "</pre>";
        die;
    }
}
