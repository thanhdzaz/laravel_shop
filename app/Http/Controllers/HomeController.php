<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    public function index(Request $request){
        $data = DB::table('tbl_product')->get();
        $brand = DB::table('tbl_brand')->get();
        $gio = DB::table('tbl_cart')->get();
        $cate = DB::table('tbl_cate')->get();


        	$so_luong = 0; 
								foreach ($gio as $a => $cart_l){
                                    if ($cart_l->user_name == Session::get('user_name')){
                                    $so_luong += $cart_l->quantity;
                                    } 
                                }
									Session::put('so_luong',$so_luong);
								
        $control = view('pages.home')->with('data',$data)->with('brand',$brand)->with('cate',$cate);

        return view('layout')->with('pages.home',$control);
    }


    
}
