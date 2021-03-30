<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
session_start();
class BrandController extends Controller
{
       
    public function add(){
        
        $cate = DB::table('tbl_cate')->orderby('id','asc')->get();
        return view('admin.add_brand')->with('cate',$cate);
}

public function all(){
        
$all =  DB::table('tbl_brand')->get();
        $manager = view('admin.all_brand')->with('all',$all);
        return view('admin_layout')->with('admin.all_brand',$manager);
}

public function save( Request $request){
        
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_info'] = $request->brand_info;
        $data['cate_id'] = $request->cate_id;
        $data['brand_status'] = $request->brand_status;
        

        DB::table('tbl_brand')->insert($data);
        Session::put('message',"Thêm thành công.👏👏");
        return redirect('/add-brand');
        
}

public function search(Request $request){
        
        $all =  DB::table('tbl_brand')->where('brand_name','LIKE',"%{$request->text}%")->get();
        Session::put('search',$request->text);
        $manager = view('admin.all_brand')->with('all',$all);
        return view('admin_layout')->with('admin.all_brand',$manager);
}
//edit brand
public function up($id){
        
        DB::table('tbl_brand')->where('brand_id',$id)->update(['brand_status'=>0]);
        $arr = DB::table('tbl_brand')->where('brand_id',$id)->first();
        Session::put('message',"Active");
        Session::put('name',$arr->brand_name);
        return redirect('/all-brand');
}
public function down($id){
        
        DB::table('tbl_brand')->where('brand_id',$id)->update(['brand_status'=>1]);
        $arr = DB::table('tbl_brand')->where('brand_id',$id)->first();
        Session::put('message',"Unactive");
        Session::put('name',$arr->brand_name);
        return redirect('/all-brand');

}


public function form(){
        
        return view('admin.edit_brand');
}

        //start edit
public function edit($id){
        
        $arr = DB::table('tbl_brand')->where('brand_id',$id)->first();
        Session::put('name',$arr->brand_name);
        Session::put('info',$arr->brand_info);
        Session::put('brand_id',$arr->brand_id);
        return redirect('/edit-form-brand');
}

public function confirm(Request $request){
        
        // DB::table('tbl_brand')->where('brand_id',$request->brand_id)->update(['brand_name'=> $request->brand_name]);
        // DB::table('tbl_brand')->where('brand_id',$request->brand_id)->update(['brand_info'=> $request->brand_info]);  //phuong an 2
        // DB::table('tbl_brand')->where('brand_id',$request->brand_id)->update(['brand_status'=> $request->brand_status]);
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_info'] = $request->brand_info;
        $data['brand_status'] = $request->brand_status;
        DB::table('tbl_brand')->where('brand_id',$request->brand_id)->update($data);
        Session::put('message',"Sửa thành công.👏👏");
        return redirect('/all-brand');
        
        }
        //^confirm edit

        public function remove($id){
                
                DB::table('tbl_brand')->where('brand_id',$id)->delete();
                Session::put('message',"Xóa thành công.👏👏");
                return redirect('/all-brand');
        }
//end edit brand






}

