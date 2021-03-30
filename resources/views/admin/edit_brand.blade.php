
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
        if($message)
      {
        echo "<p>";
        echo $message,"</p>";
        Session::put('message',null);
      }
    ?></span>
        <div class="position-center">
            <form role="form" action="{{URL::to('/edit-brand-confirm')}}" method="post">
                {{ csrf_field() }}
            <div class="form-group">
                <label for="brand_name">Tên danh mục</label>
                <input type="text" class="form-control" name="brand_name" value="<?php $name = Session::get('name');
                echo $name;  //hiển thị tên lúc chỉnh sửa
                Session::put('name',null);

                ?>">
            </div>
            <input type="hidden" name="brand_id" value="<?php $name = Session::get('brand_id');
                echo $name;  //hiển thị id lúc chỉnh sửa
                Session::put('brand_id',null);

            ?>"></input>
            <div class="form-group">
                <label for="info"">Mô tả</label>
                <textarea name="brand_info" style="resize: none;" rows="8" class="form-control" id="brand-info" ><?php 
                $info = Session::get('info');
                echo $info;  //hiển thị info lúc chỉnh sửa
                Session::put('info',null);

                ?></textarea>
            </div>
            
            <div>
                <label for="hide"">Hiển thị</label>
                <select name="brand_status" class="form-control input-lg m-bot15">
                <option value="1">Ẩn</option>
                <option value="0">Hiện</option>
                </select>
            </div>
            <button type="submit" class="btn btn-info">Sửa danh mục</button>
        </form>
        </div>

    </div>
</section>
@endsection