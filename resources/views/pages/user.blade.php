

@extends('header')
@section('content')



{{-- <div class="features_items">
                        <h2 class="title text-center">Account</h2>
                        <div class="">
                            <ul>
                                <li class="col-sm-6">Tên tài khoản: {{$value->user_name}}</li>
                                <li class="col-lg-6">Email: {{$value->user_email}}</li>
                                <li class="col-sm-6">Số điện thoại: {{$value->user_phone}}</li>
                            </ul>
                        </div>
</div> --}}


<section id="form"><!--form-->
      <div class="container">
          <div class="row">
              <div class="col-sm-offset-1">
                  <div class="login-form"><!--login form-->
                      <h2>Thông tin tài khoản</h2>
                      <h4 class="col-sm-6 text-lagre"><i class="glyphicon glyphicon-user"></i> Tên tài khoản: {{$value->user_name}}</h4>
                      <h4 class="col-lg-6 text-lagre"><i class="glyphicon glyphicon-send"></i> Email: {{$value->user_email}}</h4>
                      <h4 class="col-sm-6 text-lagre"><i class="glyphicon glyphicon-phone"></i> Số điện thoại: {{$value->user_phone}}</h4>
                  </div><!--/login form-->
              </div>
              
                  
              
          </div>
      </div>
  </section><!--/form-->

                        
 @endsection