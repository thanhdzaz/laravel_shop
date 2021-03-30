
@extends('admin_layout');
@section('cate-all')
<script type="text/javascript">
  function confirm_delete() {
    return confirm('are you sure?');
  }
  </script>
<style>
  #style-fa-up{
  font-size: 20px;
  color: rgb(40, 212, 40);
  }

  #style-fa-down{
  font-size: 20px;
  color: rgb(204, 15, 15);
  }

  #fa-style{
  font-size: 20px;
  }

</style>
<section id="main-content" style="margin-top: -100px; margin-left: -20px;">
	<section class="wrapper">

		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê danh mục thương hiệu

    </div>
    <span style="text-align: center; color: green; font-size: 25px;" >
      <?php
        $message = Session::get('message');
        $name =  Session::get('name');
        if($message)
      {
        echo "<p>";
        echo $message," ",$name,"</p>";
        Session::put('message',null);
        Session::put('name',null);
      }?></span>
    <div class="row w3-res-tb">
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <?php 
          $search = Session::get('search') ?>
        <form role="form" action="{{URL::to('/search-brand')}}" method="post">
          {{ csrf_field() }}
          <input type="text" class="input-sm form-control" name="text" placeholder="Search" value="{{$search}}">
          <button class="btn btn-sm btn-default" type="submit">Go!</button> 
          <?php 
         Session::put('search',null); ?>
          </form>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên thương hiệu</th>
            <th>Giới Thiệu</th>
            <th>Trạng thái</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        @foreach ($all as $key => $brand_pro)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
          <td>{{ $brand_pro->brand_name }}</td>
            <td><span class="text-ellipsis">{{$brand_pro->brand_info}}</span></td>
            <td><span class="text-ellipsis"><?php
              //  echo (!$cate_pro->cate_status ? 
              //  '<a href="#"><span id="style-fa-up" class="fa fa-thumbs-up"></span></a>' 
              //  : 
              //  '<a href="#"><span id="style-fa-down" class="fa fa-thumbs-down"></span></a>');

              if ($brand_pro->brand_status == 0) { ?>
                <a href="{{URL::to('/brand-down/'.$brand_pro->brand_id)}}"><span id="style-fa-up" class="fa fa-check"></span></a>
              <?php } else { ?>
                <a href="{{URL::to('/brand-up/'.$brand_pro->brand_id)}}"><span id="style-fa-down" class="fa fa-check"></span></a>
             <?php }  ?>

            </span></td>
            <td>
              <a href="{{URL::to('/brand-edit/'.$brand_pro->brand_id)}}" class="active" ui-toggle-class=""><i id="fa-style" class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onClick="return confirm('Xác nhận xóa?')" href="{{URL::to('/brand-remove/'.$brand_pro->brand_id)}}"><br><i id="fa-style" class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">hiển thị từ 20-30</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
</section>

@endsection


