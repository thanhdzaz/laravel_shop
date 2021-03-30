<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;



class ShopController extends Controller
{
    public function login_form()
    {
        return view('pages/user_login');
    }
    
    public function dang_nhap(Request $request)
    {
        $email  = $request->user_email;
        $name = $request->user_name;
        $password = md5($request->user_password);



        if ($email) {
            $result = DB::table('tbl_shop_user')->where('user_email', $email)->where('user_password', $password)->first();

            if (!$result) {
                Session::put('message', 'Sai email hoặc mật khẩu.');
                return redirect('/user-login');
            } else {
                Session::put('user_name', $result->user_name);
                Session::put('user_id', $result->user_id);
                Session::put('user_email', $result->user_email);

                return redirect('/trang-chu');
            }
        } else {

            $result = DB::table('tbl_shop_user')->where('user_name', $name)->where('user_password', $password)->first();
            if (!$result) {
                Session::put('message', 'Sai email hoặc mật khẩu.');
                return redirect('/user-login');
            } else {
                Session::put('user_name', $result->user_name);
                Session::put('user_id', $result->user_id);
                Session::put('user_email', $result->user_email);

                return redirect('/trang-chu');
            }
        }
    }

    public function dang_ky(Request $request)
    {
        $data = array();
        $check1 = DB::table('tbl_shop_user')->where('user_name', $request->user_name)->first();
        $check2 = DB::table('tbl_shop_user')->where('user_email', $request->user_email)->first();

        if ($check1) {
            Session::put('message', "Tài khoản đã tồn tại. ");
            return redirect('/user_login');
        } elseif ($check2) {
            Session::put('message', "Email đã tồn tại. ");
            return redirect('/user_login');
        } else {
            $data['user_name'] = $request->user_name;
            $data['user_email'] = $request->user_email;
            $data['user_phone'] = $request->user_phone;
            $data['user_password'] = md5($request->user_password);

            DB::table('tbl_shop_user')->insert($data);
            Session::put('message', "Đăng ký thành công.");
            return redirect('/user-login');
        }
    }
   
    public function show($name)
    {
        if (Session::get('user_name') == $name || $name == "Guest") {
            if (!$name) {
                return redirect('/home');
            }
            $value = DB::table('tbl_shop_user')->where('user_name', $name)->first();
            if (!$value) {
                return redirect('/home');
            }
            $control = view('pages.user')->with('value', $value);

            return view('header')->with('pages.user', $control);
        } else {
            return redirect('/home');
        }
    }

    public function logout()
    {
        Session::put('user_name', null);
        Session::put('user_id', null);
        Session::put('user_email', null);
        return  redirect('/trang-chu');
    }

// Shopping cart

    public function cart_view($user_name)
    {
        $data = DB::table('tbl_cart')
            ->join('tbl_product', 'tbl_cart.product_id', '=', 'tbl_product.product_id')
            ->select('tbl_cart.cart_id', 'tbl_cart.product_name', 'tbl_cart.quantity','tbl_cart.product_id', 'tbl_cart.product_price', 'tbl_product.product_image', 'tbl_product.product_info')
            ->where('user_name', $user_name)->get();


        $control = view('pages.cart')->with('data', $data);
        return view('header')->with('pages.cart', $control);
    }


    public function cart_up($id, $name, $quantity)
    {

        $quantity += 1;
        DB::table('tbl_cart')->where('cart_id', $id)->update(['quantity' => $quantity]);

        return redirect('/cart/' . $name);
    }

    public function cart_down($id, $name, $quantity)
    {
        $quantity -= 1;
        if($quantity<1){
            $quantity=1;
            Session::put('message', "Số Lượng không thể bé hơn 1.");
        }
        
        
        DB::table('tbl_cart')->where('cart_id', $id)->update(['quantity' => $quantity]);

        return redirect('/cart/' . $name);
    }



    public function cart_remove($cart_id, $name)
    {
        DB::table('tbl_cart')->where('cart_id', $cart_id)->delete();
        return redirect('/cart/' . $name);
    }

    public function cart_add($product_id, $user_name)
    {
        if ($user_name == null) {
            return redirect('/notices');
        }
        $data = DB::table('tbl_product')->where('product_id', $product_id)->first();
        $check = DB::table('tbl_cart')->where('user_name', $user_name)->where('product_id', $product_id)->first();
        if ($check) {
            $data = DB::table('tbl_cart')->where('cart_id', $check->cart_id)->first();

            DB::table('tbl_cart')->where('cart_id', $check->cart_id)->update(['quantity' => $data->quantity + 1]);

            return redirect('/trang-chu');
        } else {
            $data = DB::table('tbl_product')->where('product_id', $product_id)->first();
            $arr['quantity'] = 1;
            $arr = array();
            $arr['user_name'] = $user_name;
            $arr['product_id'] = $product_id;
            $arr['product_name'] = $data->product_name;
            $arr['product_price'] = $data->product_price;
            DB::table('tbl_cart')->insert($arr);
            return redirect('/trang-chu');
        }
        return redirect('/trang-chu');
    }
}
