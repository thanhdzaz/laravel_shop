@extends('header')

@section('user-login')

  <h2 class="title text-center"> Yêu cầu đăng nhập hoặc đăng ký
    </h2>
    <div class="container">
        <br>
        <br>
        <br>
        <br>
        <br>
        <p class="text-center"><i class="text-center glyphicon glyphicon-ban-circle"></i> Vì lý do bảo mật để sử sụng giỏ hàng vui lòng <span><a href="{{URL::to('/user-login')}}"> Đăng nhập</a></span> hoặc <span><a href="{{URL::to('/user-login')}}"> Đăng ký</a></span> nếu chưa có tài khoản. Thân ái!!</p>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>
</section><!--/form-->
@endsection