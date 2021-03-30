@extends('header');
@section('cart_view')
    
<section id="cart_items">
    <div class="container">
        <div  class="breadcrumbs">
            <ol class="breadcrumb">
            <li><a href="{{URL::to('/trang-chu')}}">Trang chủ</a></li>
              <li class="active">Giỏ hàng</li>
            </ol>
        </div> @php
                if(!empty(Session::get('message'))){
                    echo "<h4>".Session::get('message')."</h4><br><br>";
                    Session::put('message','');
                }
            @endphp
        <div class="table-responsive cart_info">
           
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Sản phẩm</td>
                        <td class="name">Tên sản phẩm</td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Tổng</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $cart)
                        
                    

                    <tr>
                        <td class="cart_product">
                        <img style="width: 120px" src="../public/frontend/upload/img/{{$cart->product_image}}" alt="">
                        </td>
                        <td class="cart_name">
                        <h4 class="text-center"><a style="color: black; text-decoration: none" href="{{URL::to('/san-pham/'.$cart->product_id)}}">{{$cart->product_name}}</a></h4>
                            <p class="text-center">{{$cart->product_info}}</p>
                        </td>
                        <td class="cart_price">
                            <b style="font-size: 24px">{{number_format($cart->product_price)}} ₫</b>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up" href="{{URL::to('/cart-up/'.$cart->cart_id.'/'.Session::get('user_name').'/'.$cart->quantity)}}"> + </a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="{{$cart->quantity}}" autocomplete="off" size="2" min="1" max="100">
                                <a class="cart_quantity_down" href="{{URL::to('/cart-down/'.$cart->cart_id.'/'.Session::get('user_name').'/'.$cart->quantity)}}"> - </a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <b style="font-size: 24px">{{number_format($cart->product_price*$cart->quantity)}} ₫</b>
                        </td>
                        <td class="cart_delete">
                        <a class="cart_quantity_delete" href="{{URL::to('/cart-remove/'.$cart->cart_id.'/'.Session::get('user_name'))}}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>Tiếp theo bạn muốn làm gì?</h3>
            <p>Điền thông tin giao hàng</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        
                        <li> 
                            <label>Mã giảm giá</label>
                            <input class="form-control" type="text" name="ma_giam" placeholder="Nếu có 🤣🤣" >
                           
                        </li>
                        <li>
                            <input type="checkbox" name="ship" value="1">
                            <label>Ship tận giường 🛒</label>
                        </li>
                        <li>
                            <input type="checkbox" >
                            <label>Ra shop checkout 🛒</label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Thành phố</label>
                            <select>
                                <option>Hà Nội</option>
                                <option>Hồ Chí Minh</option>
                                <option>Khác</option>
                                
                            </select>
                            
                        </li>
                        <li>
                            <label>Địa chỉ</label>
                            <textarea class="" style="resize: none;" rows="4" cols="40" type="text" name="dia_chi" ></textarea>
                        
                        </li>
                    
                    </ul>
                    
                </div>
            </div>
            <div class="col-sm-6">
               <?php $tong = 0;?>
                @foreach ($data as $key => $cart)
                       <?php $tong += $cart->product_price*$cart->quantity; ?>     

                @endforeach



                <div class="total_area">
                    <ul>
                        <li>Tổng tiền hàng<span>{{number_format($tong)}}  ₫</span></li>
                        <li>Phí ship <span>0 ₫</span></li>
                        <li>Tổng <span>{{number_format($tong)}}  ₫</span></li>
                    </ul>
                        
                        <a class="btn btn-default check_out" href="">Mua ngay</a>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->


@endsection