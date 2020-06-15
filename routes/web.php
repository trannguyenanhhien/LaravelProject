<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Home@index');

Route::get('/home/{idcategory}/', 'Home@index1');

Route::get('customer', function () {
    return view('customer.home');
});
Route::get('insert', function () {
    DB::table('users')->insert([
        ['name' => 'nhiben', 'email' => str_random(5) . '.com', 'password' => bcrypt('benbacker')],
    ]);
});


Route::get('logout', 'Signin@logout');
Route::get('login', 'Signin@signin');
Route::post('signin', 'Signin@Login');
Route::group(['middleware' => ['AuthMiddleware']], function () {
    Route::group(['prefix' => 'admin'], function () {
        //Category
        Route::get('index', function () {
            return view('admin.layout.wrapper');
        });
        Route::get('category', 'Category@index');
        Route::get('category/delete/{id}', 'Category@delete');
        Route::post('category/insert', 'Category@insert');
        Route::post('category/edit', 'Category@edit');
        Route::post('category/update/{id}', 'Category@update');
        //Subcategory
        Route::get('subcategory/{url}', 'Subcategory@index');
        Route::post('subcategory/insert', 'Subcategory@insert');
        Route::post('subcategory/edit', 'Subcategory@edit');
        Route::get('subcategory/delete/{id}', 'Subcategory@delete');
        Route::post('subcategory/update/{id}', 'Subcategory@update');

        //
        Route::get('users', 'Users@index');
        Route::post('users/insert', 'Users@insert');
        Route::post('users/edit', 'Users@edit');
        Route::get('users/delete/{id}', 'Users@delete');
        Route::post('users/update/{id}', 'Users@update');
        //
        Route::get('product', 'Products@index');
        Route::post('product/new', 'Products@new');
        Route::post('product/insert', 'Products@insert');
        Route::post('product/loadsub', 'Products@loadsub');
        Route::post('product/loadser', 'Products@loadser');
        Route::get('product/delete/{id}', 'Products@delete');
        Route::post('product/update/{id}', 'Products@update');
        Route::post('product/edit/{id}', 'Products@edit');

        //Khuyến mãi
        Route::get('promotion', 'Promotion@index');
        Route::post('promotion/insert', 'Promotion@insert');
        Route::post('promotion/edit', 'Promotion@edit');
        Route::get('promotion/delete/{id}', 'Promotion@delete');
        Route::post('promotion/update/{id}', 'Promotion@update');

        //Hãng sản xuất
        Route::get('brand', 'Brand@index');
        Route::post('brand/insert', 'Brand@insert');
        Route::post('brand/edit', 'Brand@edit');
        Route::get('brand/delete/{id}', 'Brand@delete');
        Route::post('brand/update/{id}', 'Brand@update');
        //Banner marketing
        Route::get('banner', 'Banner@index');
        Route::post('banner/insert', 'Banner@insert');
        Route::post('banner/edit', 'Banner@edit');
        Route::get('banner/delete/{id}', 'Banner@delete');
        Route::post('banner/update/{id}', 'Banner@update');

        //Profile
        Route::get('profile/{id}', function ($id) {
            switch ($id) {
                case 1:
                    $user = array(
                        'name' => 'Võ Trung Hiếu',
                        'email' => '17520487@gm.uit.edu.vn',
                        'phone' => '+84 968540305',
                        'img_link' => 'https://scontent.fsgn2-1.fna.fbcdn.net/v/t1.0-9/p960x960/70906418_1350377618471842_1424057674697277440_o.jpg?_nc_cat=111&_nc_eui2=AeGObWaUlFEbhwnRbscEBPdhXizkRP6Vr6Q8abc_n2NyXXTk9cpSd_wJvfbXbxLtKEy8dT9xlnaKPxhMhHKRhjaXqyJmFHIl2esL_kSJV6-Z9Q&_nc_oc=AQmwosZEtqIrVaaOQolaOSW7GxKGUQ8hwaAyFDPm9dCxkq0ugwdvRzyt3D1EqaKJVwg&_nc_ht=scontent.fsgn2-1.fna&oh=fd233487b706c6d8722c2d05ba578781&oe=5E520E1B',
                        'face_link' => 'https://www.facebook.com/tin.ho.52',
                        'ins_link' => 'https://www.instagram.com/hieuvo044/',
                        'tw_link' => 'https://twitter.com/VTrungH76654611',
                        'skill' => [['name' => 'C++', 'value' => 67], ['name' => 'Java', 'value' => 70], ['name' => 'HTML5', 'value' => 77], ['name' => 'CSS3', 'value' => 50], ['name' => 'Javascript', 'value' => 87]]
                    );
                    break;
                case 2:
                    $user = array(
                        'name' => 'Trần Nguyễn Anh Hiển',
                        'email' => '17520477@gm.uit.edu.vn',
                        'phone' => '+84 9123645645',
                        'img_link' => 'https://scontent.fsgn2-3.fna.fbcdn.net/v/t1.0-9/p960x960/73324144_1181827322006520_1929047839028019200_o.jpg?_nc_cat=106&_nc_eui2=AeFxnIP6InM6X5C3lDBv_M-abtrgIrkXZu4n_6bFWWZBWD8RjQv_ozMbBeUAcLMdXQnkost48_MX6SAoOYIcoWJrC4KXjzOf8M-SWgV36pf4lw&_nc_oc=AQkkkD6WBXXQuImDywlsOHg7pX6ZAINLEvogGL5iWRhKLiSiVMxOu2zHjpkbr2GY9_Y&_nc_ht=scontent.fsgn2-3.fna&oh=09d8f52fc638feffccf151ccb480b523&oe=5E52A7FD',
                        'face_link' => 'https://www.facebook.com/tnah.gon',
                        'ins_link' => 'https://www.facebook.com/tnah.gon',
                        'tw_link' => 'https://www.facebook.com/tnah.gon',
                        'skill' => [['name' => 'C++', 'value' => 67], ['name' => 'Java', 'value' => 70], ['name' => 'HTML5', 'value' => 77], ['name' => 'CSS3', 'value' => 50], ['name' => 'Javascript', 'value' => 87]]
                    );
                    break;
                case 3:
                    $user = array(
                        'name' => 'Võ Nhật Bảo',
                        'email' => '17520277@gm.uit.edu.vn',
                        'phone' => '+84 123213123',
                        'img_link' => 'https://scontent.fsgn2-1.fna.fbcdn.net/v/t31.0-8/p960x960/24132007_811143392380347_6773020926246026771_o.jpg?_nc_cat=107&_nc_eui2=AeEjKtLjiOBKFUjuQ_KYcA_x9_2v5FQmGBexdl2wYbh_zOGgoQc2CHSDQFAVZt-A-Vi4sHl0693c0KqnRD4l8iev12uKu8pd_WQdZr4a7N8dyA&_nc_oc=AQkEOpgLJj_2JprgUcckxJ_jPz0T3FHSbBptzhA6PkJIA526xzb_J8dqN0TOy8ZG4Is&_nc_ht=scontent.fsgn2-1.fna&oh=8b62d834afee0131669425016032a905&oe=5E50FE22',
                        'face_link' => 'https://www.facebook.com/benbacker99er',
                        'ins_link' => 'https://www.facebook.com/benbacker99er',
                        'tw_link' => 'https://www.facebook.com/benbacker99er',
                        'skill' => [['name' => 'C++', 'value' => 67], ['name' => 'Java', 'value' => 70], ['name' => 'HTML5', 'value' => 77], ['name' => 'CSS3', 'value' => 50], ['name' => 'Javascript', 'value' => 87]]
                    );
                    break;
                case 4:
                    $user = array(
                        'name' => 'Nguyễn Văn Mạnh',
                        'email' => '17520123@gm.uit.edu.vn',
                        'phone' => '+84 2343243243',
                        'img_link' => 'https://scontent.fsgn2-4.fna.fbcdn.net/v/t1.0-1/p960x960/70006907_1395076867313695_3764400189104717824_o.jpg?_nc_cat=101&_nc_eui2=AeEhP8xa7834dhZ0ImZ5LMJ2JNnebNkEnW6TPo8gN5LCrYiQUWN6NnwRoKZVe8mIS4EcehXXYX_IH7mqFPsKab_9gU27puhdpFrAPUpMCRyuNw&_nc_oc=AQmbXN2fmb-XqR6cNVHnBGwX-XKd9aayl9Z89F6zXZARPzRu2V_edv_EWGlN2wd29JE&_nc_ht=scontent.fsgn2-4.fna&oh=72a6f6b37a1d896b4f371a810e2e7fca&oe=5E8B4375',
                        'face_link' => 'https://www.facebook.com/tin.ho.52',
                        'ins_link' => 'https://www.instagram.com/hieuvo044/',
                        'tw_link' => 'https://twitter.com/VTrungH76654611',
                        'skill' => [['name' => 'C++', 'value' => 67], ['name' => 'Java', 'value' => 70], ['name' => 'HTML5', 'value' => 77], ['name' => 'CSS3', 'value' => 50], ['name' => 'Javascript', 'value' => 87]]
                    );
                    break;
            }
            return view('admin.profile', ['user' => $user]);
        });
        //Dashboard
        Route::get('Dashboard','Order@statistics');
        Route::post('Dashboard/Year','Order@statisticsWithYear');
        Route::post('Dashboard/category','Order_detail@statisticsWithCategory');
        //Series
         Route::get('series/{url}', 'Serie@index');
         Route::post('series/insert', 'Serie@insert');
         Route::post('series/edit', 'Serie@edit');
         Route::get('series/delete/{id}', 'Serie@delete');
         Route::post('series/update/{id}', 'Serie@update');
         // Order
         Route::get('order', 'Order@index');
         Route::get('order/{status}', 'Order@index');
         Route::get('order/delete/{id}', 'Order@delete');
         Route::get('order/update/{id}', 'Order@update');

         //order_detail
         Route::get('order_detail/{order_id}', 'Order_detail@detail');

    });
});

Route::get('eloquent', 'Eloquent@test');

Route::post('customer/signup', 'Customer@signup');
Route::get('customer/update/{email}', 'Customer@update');
Route::post('customer/login', 'Customer@login');
Route::get('customer/logout', 'Customer@logout');
Route::get('products/{url}', 'Home@detail');

Route::post('/searchAjax','Home@searchAjax');
Route::get('/search','Home@searchFirst');

Route::post('/search','Home@search');
//Route shopping cart
Route::post('addcart', 'Home@addcart');
Route::get('removecart', 'Home@removecart');
Route::post('updatecart', 'Home@updatecart');
Route::get('cart', 'Home@viewcart');
Route::get('checkout', 'Home@checkout');
Route::post('order', 'Customer@order');
Route::get('confim', 'Customer@confim');
Route::get('bill/{id}', 'Customer@bill');
Route::post('feedback', 'Customer@feedback');


Route::get('user/account/profile','Users@acount');
Route::get('city', 'Home@city_api');
Route::post('country', 'Home@country_api');
Route::post('update/profile/{id}', 'Customer@update_profile');

Route::get('/collections/{category_url}/{subcategory_url}/{brand_url}','Home@loadData_lv3');
Route::get('/collections/{category_url}/{sub}','Home@loadData_lv2');
Route::get('/collections/{category_url}','Home@loadData_lv1');


Route::get('pusher', 'Customer@notify');
