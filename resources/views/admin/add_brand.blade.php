
@extends('admin_layout');
@section('cate-add')
    


<section class="panel">
   
    <header class="panel-heading">
        Thêm thương hiệu
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
            <form role="form" action="{{URL::to('/save-brand')}}" method="post">
                {{ csrf_field() }}
            <div class="form-group">
                <label for="brand_name">Tên thương hiệu</label>
                <input type="text" class="form-control" name="brand_name" placeholder="Nhập tên danh mục.">
            </div>
            <div class="form-group">
                <label for="info"">Mô tả</label>
                <textarea name="brand_info" type="password" style="resize: none;" rows="8" class="form-control" id="brand-info" required></textarea>
            </div>

            <div>
                <label for="cate">Danh mục</label>
                <select name="cate_id" class="form-control input-lg m-bot15">
                    @foreach ($cate as $key => $cate_l)                   
                <option value="{{$cate_l->id}}">{{$cate_l->cate_name}}</option>
                @endforeach
                
                </select>
            </div>
            
            <div>
                <label for="hide">Hiển thị</label>
                <select name="brand_status" class="form-control input-lg m-bot15">
                <option value="1">Ẩn</option>
                <option selected="selected" value="0">Hiện</option>
                </select>
            </div>
            <button type="submit" class="btn btn-info">Thêm danh mục</button>
        </form>
        </div>

    </div>
</section>
@endsection