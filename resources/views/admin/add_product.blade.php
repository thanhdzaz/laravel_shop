
@extends('admin_layout');
@section('cate-add')
    


<section class="panel">
   
    <header class="panel-heading">
        Thêm danh mục sản phẩm
    </header>
    <div class="panel-body">
        <span style="text-align: center; color: green; font-size: 25px;" >
        <?php
        $message = Session::get('message');
        if($message)
      {
        echo "<p>";
        echo $message,"</p>";
        Session::put('message',null);
      }
    ?></span>
        <div class="position-center">
            <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
            <div class="form-group">
                <label for="product_name">Tên sản phẩm</label>
                <input type="text" class="form-control" name="product_name" placeholder="Nhập tên danh mục.">
            </div>
            <div class="form-group">
                <label for="product_price">Giá sản phẩm</label>
                <input type="text" class="form-control" name="product_price">
            </div>
            <div class="form-group">
                <label for="product_image">Hình ảnh sản phẩm</label>
                <input type="file" class="form-control" name="product_image">
            </div>
            <div class="form-group">
                <label for="info">Thông tin sản phẩm</label>
                <textarea name="product_info" type="password" style="resize: none;" rows="4" class="form-control" id="product-info" required></textarea>
            </div>
            <div class="form-group">
                <label for="info">Tóm tắt sản phẩm</label>
                <textarea name="product_content" type="password" style="resize: none;" rows="8" class="form-control" id="product-info" required></textarea>
            </div>
            
            <div>
                <label for="hide"">Danh mục</label>
                <select name="cate_id" class="form-control input-lg m-bot15">
                @foreach ($cate as $key => $cate_list)
                <option value="{{$cate_list->id}}">{{$cate_list->cate_name}}</option>
                    @endforeach
                
                
                </select>
            </div>
            <div>
                <label for="hide"">Thương hiệu</label>
                <select name="brand_id" class="form-control input-lg m-bot15">

               
                @foreach ($brand as $key => $brand_list)
                <option value="{{$brand_list->brand_id}}">{{$brand_list->brand_name}}</option>
                    @endforeach
                
                </select>
            </div>
            <div>
                <label for="hide"">Hiển thị</label>
                <select name="product_status" class="form-control input-lg m-bot15">
                <option value="1">Ẩn</option>
                <option selected="selected" value="0">Hiện</option>
                </select>
            </div>
          <br>  <button type="submit" class="btn btn-info">Thêm danh mục</button>
        </form>
        </div>

    </div>
</section>
@endsection