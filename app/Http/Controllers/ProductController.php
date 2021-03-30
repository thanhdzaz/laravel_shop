<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

session_start();
class ProductController extends Controller
{

        public function all()
        {
                $all = DB::table('tbl_product')
                        ->join('tbl_cate', 'tbl_product.cate_id', '=', 'tbl_cate.id')
                        ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                        ->select('tbl_product.product_id', 'tbl_product.product_name', 'tbl_product.product_info', 'tbl_product.product_content', 'tbl_product.product_price', 'tbl_product.product_image', 'tbl_product.product_status', 'tbl_cate.cate_name', 'tbl_brand.brand_name')->get();

                $manager = view('admin.all_product')->with('all', $all);
                return view('admin_layout')->with('admin.all_product', $manager);
        }

        public function add()
        {
                $cate    =      DB::table('tbl_cate')->get();
                $brand   =      DB::table('tbl_brand')->get();
                $manager = view('admin.add_product')->with('cate', $cate)->with('brand', $brand);
                return view('admin_layout')->with('admin.add_product', $manager);
        }

        public function save(Request $request)
        {
                $data = array();
                $data['product_name'] = $request->product_name;
                $data['product_price'] = $request->product_price;
                $data['product_info'] = $request->product_info;
                $data['brand_id'] = $request->brand_id;
                $data['cate_id'] = $request->cate_id;

                $data['product_content'] = $request->product_content;
                $data['product_status'] = $request->product_status;
                $image = $request->file('product_image');
                if ($image) {
                        $get_name_img = $image->getClientOriginalName();
                        $name_img = current(explode('.', $get_name_img));
                        $new_img = $name_img . rand(0, 99) . '.' . $image->getClientOriginalExtension();
                        $image->move('public/frontend/upload/img', $new_img);
                        $data['product_image'] = $new_img;
                        DB::table('tbl_product')->insert($data);
                        Session::put('message', "Thêm thành công.👏👏");
                        return redirect('/add-product');
                }
                $data['product_image'] = '';
                DB::table('tbl_product')->insert($data);
                Session::put('message', "Thêm thành công.👏👏");
                return redirect('/add-product');
        }

        public function search(Request $request)
        {
                $all = DB::table('tbl_product')
                        ->join('tbl_cate', 'tbl_product.cate_id', '=', 'tbl_cate.id')
                        ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                        ->select(
                                'tbl_product.product_id',
                                'tbl_product.product_name',
                                'tbl_product.product_info',
                                'tbl_product.product_content',
                                'tbl_product.product_price',
                                'tbl_product.product_image',
                                'tbl_product.product_status',
                                'tbl_cate.cate_name',
                                'tbl_brand.brand_name'
                        )
                        ->where('product_name','LIKE', "%{$request->text}%")->get();
                        Session::put('search',$request->text);
                $manager = view('admin.all_product')->with('all', $all);
                return view('admin_layout')->with('admin.all_product', $manager);
        }
        //edit product

        public function up($id)
        {
                DB::table('tbl_product')->where('product_id', $id)->update(['product_status' => 0]);
                $arr = DB::table('tbl_product')->where('product_id', $id)->first();
                Session::put('message', "Active");
                Session::put('name', $arr->product_name);
                return redirect('/all-product');
        }

        public function down($id)
        {

                DB::table('tbl_product')->where('product_id', $id)->update(['product_status' => 1]);
                $arr = DB::table('tbl_product')->where('product_id', $id)->first();
                Session::put('message', "Unactive");
                Session::put('name', $arr->product_name);
                return redirect('/all-product');
        }

        public function form()
        {

                $cate = DB::table('tbl_cate')->where('cate_status', '0')->get();
                $brand = DB::table('tbl_brand')->where('brand_status', '0')->get();
                $control = view('admin.edit_product')->with('cate', $cate)->with('brand', $brand);
                return view('admin_layout')->with('admin.edit_product', $control);
        }

        //start edit
        public function edit($id)
        {
                $arr = DB::table('tbl_product')->where('product_id', $id)->first();
                Session::put('product_name', $arr->product_name);
                Session::put('product_info', $arr->product_info);
                Session::put('product_content', $arr->product_content);
                Session::put('product_id', $arr->product_id);
                Session::put('product_price', $arr->product_price);
                return redirect('/edit-form-product');
        }

        public function confirm(Request $request)
        {
                // DB::table('tbl_product')->where('product_id',$request->product_id)->update(['product_name'=> $request->product_name]);
                // DB::table('tbl_product')->where('product_id',$request->product_id)->update(['product_info'=> $request->product_info]);  //phuong an 2
                // DB::table('tbl_product')->where('product_id',$request->product_id)->update(['product_status'=> $request->product_status]);
                $data = array();
                $data['product_name'] = $request->product_name;
                $data['product_info'] = $request->product_info;
                $data['product_content'] = $request->product_content;
                $data['product_status'] = $request->product_status;
                DB::table('tbl_product')->where('product_id', $request->product_id)->update($data);
                Session::put('message', "Sửa thành công.👏👏");
                return redirect('/all-product');
        }
        //^confirm edit

        public function remove($id)
        {
                $remove = DB::table('tbl_product')->where('product_id', $id)->first();
                unlink('public/frontend/upload/img/' . $remove->product_image);
                DB::table('tbl_product')->where('product_id', $id)->delete();
                Session::put('message', "Xóa thành công.👏👏");
                return redirect('/all-product');
        }
        //end edit product

}
