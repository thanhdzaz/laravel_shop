<?php

use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

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


Route::get('/trang-chu', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');




//shop
Route::get('/user-login', 'ShopController@login_form');
Route::get('/user-logout', 'ShopController@logout');
Route::get('/user-account/{name}','ShopController@show');
Route::get('/cart/{user_name}', 'ShopController@cart_view');
Route::get('/cart', function(){
    if (!Session::get('user_name')) {
         Session::put('message',"Vì lý do bảo mật để sử sụng giỏ hàng vui lòng Đăng nhập hoặc Đăng ký nếu chưa có tài khoản. Thân ái!!");
    return redirect('/user-login');
    }else{
        return redirect('/cart/'.Session::get('user_name'));
    }
   
});
Route::get('/add-cart/{product_id}/{user_name}', 'ShopController@cart_add');
Route::get('/add-cart/{product_id}', function(){
    return view('pages.notices');
});
Route::get('/cart-up/{id}/{name}/{quantity}','ShopController@cart_up');
Route::get('/cart-down/{id}/{name}/{quantity}','ShopController@cart_down');
Route::get('/cart-remove/{cart_id}/{name}','ShopController@cart_remove');



Route::post('/dang-nhap', 'ShopController@dang_nhap');
Route::post('/dang-ky', 'ShopController@dang_ky');
    





//admin

Route::get('/admin', 'AdminController@login' );
Route::get('/dashboard', 'AdminController@dashboard');
Route::get('/admin_logout', 'AdminController@admin_logout');

Route::post('/admin-dashboard', 'AdminController@check_login');


//admin-category

Route::get('/add-category', 'CategoryProduct@add');
Route::get('/all-category', 'CategoryProduct@all');
Route::get('/cate-up/{id}', 'CategoryProduct@up');
Route::get('/cate-down/{id}', 'CategoryProduct@down');
Route::get('/cate-edit/{id}', 'CategoryProduct@edit');
Route::get('/edit-form-cate','CategoryProduct@form');
Route::get('/cate-remove/{cate_id}', 'CategoryProduct@remove');

Route::post('/edit-cate-confirm', 'CategoryProduct@confirm');
Route::post('/save-cate', 'CategoryProduct@save');
Route::post('/search-cate', 'CategoryProduct@search');

//admin-brand
Route::get('/add-brand', 'BrandController@add');
Route::get('/all-brand', 'BrandController@all');
Route::post('/save-brand', 'BrandController@save');
Route::get('/brand-remove/{brand_id}', 'BrandController@remove');
Route::get('/brand-up/{id}', 'BrandController@up');
Route::get('/brand-down/{id}', 'BrandController@down');
Route::get('/brand-edit/{id}', 'BrandController@edit');
Route::get('/edit-form-brand','BrandController@form');

Route::post('/edit-brand-confirm', 'BrandController@confirm');
Route::post('/search-brand', 'BrandController@search');


//admin-product
Route::get('/add-product', 'ProductController@add');
Route::get('/all-product', 'ProductController@all');
Route::post('/save-product', 'ProductController@save');

Route::get('/product-up/{id}', 'ProductController@up');
Route::get('/product-down/{id}', 'ProductController@down');
Route::get('/product-edit/{id}', 'ProductController@edit');
Route::get('/edit-form-product','ProductController@form');

Route::post('/edit-product-confirm', 'ProductController@confirm');
Route::get('/product-remove/{brand_id}', 'ProductController@remove');
Route::post('/search-product', 'ProductController@search');