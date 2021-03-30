@extends('layout')
@section('content')



<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Sản phẩm hot</h2>
						

						@foreach ($data as $key => $all)
								
						@if ($all->product_status==0)

						<div class="col-sm-4">

							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img style="width: auto; height: 200px;" src="/shop/public/frontend/upload/img/{{$all->product_image}}" alt="" />
										<h2>{{number_format($all->product_price)}} VND</h2>
										<p>{{$all->product_name}}</p>
									<a href="{{URL::to('/add-cart/'.$all->product_id.'/'.Session::get('user_name'))}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Ném vào giỏ</a>
									</div>
									
								</div>
							</div>

							
						</div>
						@endif
						@endforeach

							
						
						
                    </div><!--features_items-->
                    

					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">gợi ý</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	

								@if ($data[2]->product_status == 0)
										
									
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="public/frontend/upload/img/{{$data[2]->product_image}}" alt="" />
													<h2>{{number_format($data[2]->product_price)}} VND</h2>
													<p>{{$data[2]->product_name}}</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Ném vào giỏ</a>
												</div>
												
											</div>
										</div>
									</div>
								@endif

								@if ($data[1]->product_status == 0)
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="public/frontend/upload/img/{{$data[1]->product_image}}" alt="" />
													<h2>{{number_format($data[1]->product_price)}} VND</h2>
													<p>{{$data[1]->product_name}}</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Ném vào giỏ</a>
												</div>
												
											</div>
										</div>
									</div>
								@endif

								@if ($data[0]->product_status == 0)
									
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="public/frontend/upload/img/{{$data[0]->product_image}}" alt="" />
													<h2>{{number_format($data[0]->product_price)}} VND</h2>
													<p>{{$data[0]->product_name}}</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Ném vào giỏ</a>
												</div>
												
											</div>
										</div>
									</div>
								</div>
								@endif

								<div class="item">	
									<?php  $a=0; ?>
									@for ($a=0 ; $a<=2;$a++)
									@if ($data[$a]->product_status == 0)
									
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img style="height: 125px; width: auto;" src="public/frontend/upload/img/{{$data[$a]->product_image}}" alt="" />
													<h2>{{number_format($data[$a]->product_price)}} VND</h2>
													<p>{{$data[$a]->product_name}}</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Ném vào giỏ</a>
												</div>
												
											</div>
										</div>
									</div>
									@endif
									@endfor
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>	
						</div>		
						</div>
					</div><!--/recommended_items-->
 
    
@endsection  

