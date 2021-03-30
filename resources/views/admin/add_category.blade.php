
@extends('admin_layout');
@section('cate-add')
    


<section class="panel">
   
    <header class="panel-heading">
        Thêm danh mục sản phẩm.
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
            <form role="form" action="{{URL::to('/save-cate')}}" method="post">
                {{ csrf_field() }}
            <div class="form-group">
                <label for="cate_name">Tên danh mục</label>
                <input type="text" class="form-control" name="cate_name" placeholder="Nhập tên danh mục.">
            </div>
            <div class="form-group">
                <label for="info"">Mô tả</label>
                <textarea name="cate_info" type="password" style="resize: none;" rows="8" class="form-control" id="cate-info" required></textarea>
            </div>
            
            <div>
                <label for="hide"">Hiển thị</label>
                <select name="cate_status" class="form-control input-lg m-bot15">
                <option value="1">Ẩn</option>
                <option value="0">Hiện</option>
                </select>
            </div>
            <button type="submit" class="btn btn-info">Thêm danh mục</button>
        </form>
        </div>

    </div>
</section>
@endsection