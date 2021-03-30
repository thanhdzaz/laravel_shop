
@extends('admin_layout');
@section('brand-edit')
    


<section class="panel">

    <header class="panel-heading">
        Sửa danh mục thương hiệu
    </header>
    <div class="panel-body">
        <span style="text-align: center; color: green; font-size: 25px;" >
        <?php
        $message = Session::get('message');
        $id = Session::get('product_id');
        if (!$id) {
            header('Location: all-product');
            exit();
        }
        if($message)
      {
        echo "<p>";
        echo $message,"</p>";
        Session::put('message',null);
      }
    ?></span>
        <div class="position-center">
            <form role="form" action="{{URL::to('/edit-product-confirm')}}" method="post">
                {{ csrf_field() }}
            <div class="form-group">
                <label for="product_name">Tên sản phẩm</label>
                <input type="text" class="form-control" name="product_name" value="<?php $name = Session::get('product_name');
                echo $name;  //hiển thị tên lúc chỉnh sửa
                Session::put('product_name',null);

                ?>">
            </div>
          
            <div class="form-group">
                <label for="product_price">Giá sản phẩm</label>
                <input type="text" class="form-control" name="product_price" value="<?php $name = Session::get('product_price');
                echo $name;  //hiển thị tên lúc chỉnh sửa
                Session::put('product_price',null);

                ?>">
            </div>
            <input type="hidden" name="product_id" value="<?php $name = Session::get('product_id');
                echo $name;  //hiển thị id lúc chỉnh sửa
                Session::put('product_id',null);

            ?>"></input>
            <div class="form-group">
                <label for="info"">Mô tả</label>
                <textarea name="product_info" style="resize: none;" rows="8" class="form-control" id="product_info" ><?php 
                $info = Session::get('product_info');
                echo $info;  //hiển thị info lúc chỉnh sửa
                Session::put('product_info',null);

                ?></textarea>
                <div class="form-group">
                    <label for="info"">Thông tin</label>
                    <textarea name="product_content" style="resize: none;" rows="8" class="form-control" id="product_content" ><?php 
                    $info = Session::get('product_content');
                    echo $info;  //hiển thị content lúc chỉnh sửa
                    Session::put('product_content',null);
    
                    ?></textarea>
            </div>
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
            <div>
                <label for="hide"">Hiển thị</label>
                <select name="product_status" class="form-control input-lg m-bot15">
                <option value="1">Ẩn</option>
                <option value="0">Hiện</option>
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-info">Sửa danh mục</button>
        </form>
        </div>
    </div>
</section>
@endsection