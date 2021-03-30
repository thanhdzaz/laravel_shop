@extends('header')

@section('user-login')
<section id="form"><!--form-->
  <h4 class="text-center">  <?php 
        $message = Session::get('message');
        if($message){
            echo $message;
            Session::put('message',null);
        }
        ?>
    </h4>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Đăng nhập</h2>
                <form action="{{URL::to('/dang-nhap')}}" method="POST">
                    {{ csrf_field() }}
                        <input name="user_name" type="text" placeholder="Tên tài khoản hoặc email" />
                        <input name="user_password" type="password" placeholder="Mật khẩu" />
                        <span>
                            <input type="checkbox" class="checkbox"> 
                            Ghi nhớ.
                        </span>
                        <button type="submit" class="btn btn-default">Đăng nhập</button>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">Hoặc</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>Đăng ký</h2>
                <form action="{{URL::to('/dang-ky')}}" method="POST">
                    {{ csrf_field() }}
                        <input name="user_name" type="text" placeholder="Tên tài khoản" required/>
                        <input name="user_email" type="email" placeholder="Email" required/>
                        <input name="user_phone" type="text" placeholder="Điện thoại" required/>
                        <input name="user_password" type="password" placeholder="Mật khẩu" required/>
                        <button type="submit" class="btn btn-default">Đăng ký</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->
@endsection