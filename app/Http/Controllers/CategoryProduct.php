<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

class CategoryProduct extends Controller
{
        public function add(){
                return view('admin.add_category');
        }

        public function all(){
                $cate =  DB::table('tbl_cate')->get();
                $manager = view('admin.all_category')->with('cate',$cate);
                return view('admin_layout')->with('admin.all_category',$manager);
        }

        public function save( Request $request){
                $data = array();
                $data['cate_name'] = $request->cate_name;
                $data['cate_info'] = $request->cate_info;
                $data['cate_status'] = $request->cate_status;

                DB::table('tbl_cate')->insert($data);
                Session::put('message',"Thêm thành công.👏👏");
                return redirect('/add-category');
                
        }


        public function search(Request $request){
                $cate =  DB::table('tbl_cate')->where('cate_name','LIKE',"%{$request->text}%")->get();
                Session::put('search',$request->text);
                $manager = view('admin.all_category')->with('cate',$cate);
                return view('admin_layout')->with('admin.all_category',$manager);
        }
 //edit cate
        public function up($id){
                DB::table('tbl_cate')->where('id',$id)->update(['cate_status'=>0]);
                $arr = DB::table('tbl_cate')->where('id',$id)->first();
                Session::put('message',"Active");
                Session::put('name',$arr->cate_name);
                return redirect('/all-category');
        }
        public function down($id){
                
                DB::table('tbl_cate')->where('id',$id)->update(['cate_status'=>1]);
                $arr = DB::table('tbl_cate')->where('id',$id)->first();
                Session::put('message',"Unactive");
                Session::put('name',$arr->cate_name);
                return redirect('/all-category');

        }

       
        public function form(){
                return view('admin.edit_category');
        }

                //start edit
        public function edit($id){
                $arr = DB::table('tbl_cate')->where('id',$id)->first();
                Session::put('name',$arr->cate_name);
                Session::put('info',$arr->cate_info);
                Session::put('id',$arr->id);
                return redirect('/edit-form-cate');
        }

        public function confirm(Request $request){
                // DB::table('tbl_cate')->where('id',$request->id)->update(['cate_name'=> $request->cate_name]);
                // DB::table('tbl_cate')->where('id',$request->id)->update(['cate_info'=> $request->cate_info]);  //phuong an 2
                // DB::table('tbl_cate')->where('id',$request->id)->update(['cate_status'=> $request->cate_status]);
                $data = array();
                $data['cate_name'] = $request->cate_name;
                $data['cate_info'] = $request->cate_info;
                $data['cate_status'] = $request->cate_status;
                DB::table('tbl_cate')->where('id',$request->id)->update($data);
                Session::put('message',"Sửa thành công.👏👏");
                return redirect('/all-category');
                
                }
                //^confirm edit

                public function remove($id){
                        DB::table('tbl_cate')->delete($id);
                        Session::put('message',"Xóa thành công.👏👏");
                        return redirect('/all-category');
                }
//end edit cate






}
