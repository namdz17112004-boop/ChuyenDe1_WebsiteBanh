@extends('layouts.app')

@section('content')
@if(session('yeuthich'))
<script>
	alert("Bánh đã có trong giỏ hàng yêu thích của bạn");
</script>
@endif
<div class="clearfix"></div>
<div class="row">
  <div class="hom-slider bg-info" >
		<div class="container-fluid">
          <div id="sequence">
              <!-- mũi tên-->
              <div class="sequence-prev mt-5" style="background:none"><i><img src="{{ asset('images/arow_left_al.png') }}"/></i></div>
              <div class="sequence-next mt-5" style="background:none"><i><img src="{{ asset('images/arow_right_al.png') }}" style="margin-bottom:3px" /></i></div>
              <!-- hình nhé-->
              <ul class="sequence-canvas mt-5">
					<!-- hình 1-->
                  <li class="animate-in">
                      <div class="flat-caption caption1 formLeft delay300 text-center"><span class="suphead">Top Bánh Ngon</span></div>
                      <div class="flat-caption caption2 formLeft delay400 text-center">
                          <h1>Chỉ có tại EAUTCAKE</h1>
                      </div>
                      <div class="flat-caption caption3 formLeft delay500 text-center">
                          <p>Món Bánh Truyền Thống</br>Thơm ngon bổ rẻ</p>
                      </div>
                      
                      <div class="flat-image formBottom delay200" data-duration="5" data-bottom="true"><img style="height:310px;width:400px" src="{{ asset('images/img/gato1.png') }}" alt=""></div>
                  </li>
					<!-- hình 2-->
                  <li>
                      <div class="flat-caption caption2 formLeft delay400">
                          <h1>Hãy đến với EAUTCAKE</h1>
                      </div>
                      <div class="flat-caption caption3 formLeft delay500">
                          <h2>Bạn sẽ được trải nghiệm các loại bánh mới nhất<br>nHưng giá cực kỳ hấp dẫn.</h2>
                      </div>
                      <div class="flat-button caption5 formLeft delay600"><a class="more" href="{{ url('/dangky') }}">Đăng Ký Để Nhận Ưu Đãi</a></div>
                      <div class="flat-image formBottom delay200" data-bottom="true"><img style="height:320px;width:400px" src="{{ asset('images/img/cupcakes.png') }}" alt=""></div>
                  </li>
					<!-- hình 3-->
                  <li>
                      <div class="flat-caption caption2 formLeft delay400 text-center">
                          <h1>Các loại bánh mới nhất 2026</h1>
                      </div>
                      <div class="flat-caption caption3 formLeft delay500 text-center">
                          <p>Chỉ có tại EAUTCAKE. <br>Bạn còn chờ gì nữa</p>
                      </div>
                      <div class="flat-button caption4 formLeft delay600 text-center"><a class="more" href="{{ url('/dangky') }}">Đăng Ký Để Nhận Ưu Đãi</a></div>
                      <div class="flat-image formBottom delay200" data-bottom="true"><img style="height:400px;width:400px" src="{{ asset('images/img/macaron.png') }}" alt=""></div>
                  </li>
              </ul>
          </div>
          </div>
      
      <!-- hình bé tí -->
          <div class="promotion-banner">
              <div class="container">
                  <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4">
                          <div class="promo-box" ><a href="{{ url('/banh/xemchitietbanh/'.$banhmoi[0]->ID) }}"><img style="height:170px;width:410px" src="{{ asset('images/'.$banhmoi[0]->HinhAnh) }}" alt=""></a></div>
                      </div>
					   <div class="col-md-4 col-sm-4 col-xs-4">
                          <div class="promo-box" ><a href="{{ url('/banh/xemchitietbanh/'.$banhmoi[1]->ID) }}"><img style="height:170px;width:410px" src="{{ asset('images/'.$banhmoi[1]->HinhAnh) }}" alt=""></a></div>
                      </div>
					   <div class="col-md-4 col-sm-4 col-xs-4">
                          <div class="promo-box" ><a href="{{ url('/banh/xemchitietbanh/'.$banhmoi[2]->ID) }}"><img style="height:170px;width:410px" src="{{ asset('images/'.$banhmoi[2]->HinhAnh) }}" alt=""></a></div>
                      </div>
                  </div>
              </div>
          </div>
	</div>
</div>
   <!-- logo 
	<div class="row mt-3 justify-content-md-center" style="height:50px; background:#00688B">
		<img src="{{ asset('images/Untitled-1.gif') }}"width="50px" ></img>
	</div>
	-->
	
	<ul  class="nav nav-tabs nav-justified md-tabs "  id="myTabJust" role="tablist" style="background:#00688B">
	  <li class="nav-item">
		<a class="nav-link active"  id="home-tab-just" data-toggle="tab" href="#home-just" role="tab" aria-controls="home-just" aria-selected="true">Trang Chủ</a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" id="BanhBC-tab-just" data-toggle="tab" href="#BanhBC-just" role="tab" aria-controls="profile-just" aria-selected="false">Bánh Bán Chạy</a>
	  </li>

	  <li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Bánh Khuyến Mãi</a>
		<div class="dropdown-menu dropdown-default "style="background:#00688B">
		
		@php $giatrikhuyen=5 @endphp
		@while($giatrikhuyen<=50)
		  <a class="dropdown-item"id="BanhKM{{$giatrikhuyen}}" data-toggle="tab" href="#BanhKM-{{$giatrikhuyen}}">Khuyến Mãi {{$giatrikhuyen}}%</a>
		 
		  @php $giatrikhuyen+=5 @endphp
		 @endwhile
		  <div class="dropdown-divider"></div>
		  <a class="dropdown-item"id="BanhKM-tab-just" data-toggle="tab" href="#BanhKM-just">Tất Cả Bánh Khuyến Mãi</a>
		
		</div>
	  </li>
	  <li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Bánh theo loại</a>
		<div class="dropdown-menu dropdown-default "style="background:#00688B">
			@php $demloai=0; @endphp
			@foreach($loaibanh as $value)
			
		  <a class="dropdown-item" data-toggle="tab" href="#BanhTheoLoai-{{$demloai}}">{{$value->TenLoai}}</a>
		  @php $demloai++; @endphp
			@endforeach
		  <div class="dropdown-divider"></div>
		  <a class="dropdown-item"id="BanhTheoLoai" data-toggle="tab" href="#BanhTheoLoai-just">Tất Cả Bánh</a>
		</div>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" id="LienHe-tab-just" data-toggle="tab" href="#LienHe-just" role="tab" aria-controls="contact-just" aria-selected="false">Liên Hệ</a>
	  </li>
	  
	</ul>
	<div class="tab-content card pt-5" id="myTabContentJust">
		<div class="tab-pane fade show active" id="home-just" role="tabpanel" aria-labelledby="home-tab-just">
			  <div class="row" id="sanpham" style="background:#f9fffd">
			@foreach($banh as $value)
			<div class="col-md-2 justify-content-md-center mt-2 mb-2">
				<div class="card rounded-0 " >
				  <a href="{{ url('/banh/xemchitietbanh/'.$value->ID) }}"><img class="card-img-top rounded-0" style="height:12rem" src="{{ asset('images/'.$value->HinhAnh) }}" alt="Card image cap"></a>
				  <div class="card-body">
					<h6 class="card-title text-primary font-weight-bold text-center" style="text-transform: uppercase;">{{$value->TenBanh}}</h6>
					<h6>
					@for($i=1;$i<=5;$i++)
											@if($i<=$avr[$value->ID])
											<i class="icon-star" style="color:#FFFF00"></i>
											@else
												
											<i class="icon-star-empty"></i>
											@endif
										@endfor
					</h6>
					@if($value->KhuyenMai==0)
					<h6 class="card-text text-danger font-weight-bold">{{number_format($value->GiaTien)}} VNĐ</h6>
					<p style="height:2px"></p>
					@else
					<h6 class="card-text text-danger font-weight-bold">{{number_format($value->GiaTien-$value->GiaTien*$value->KhuyenMai/100)}} VNĐ</h6>
					<span class="card-text text-secondary font-weight-bold" style=" text-decoration: line-through;">{{number_format($value->GiaTien)}} VNĐ</span> -{{$value->KhuyenMai}}%
					
					@endif
					<p class="card-text text-info font-weight-bold">Loại bánh: {{$value->TenLoai}}</p>
					<p class="text-center">
					<!--<a href="{{ url('/banh/xemchitietbanh/'.$value->ID) }}" class="btn btn-primary rounded-0 shadow">Xem Chi Tiết</a>-->
					@if($value->SoLuong>0)
					<a href="{{ url('/banh/themgiohang/'.$value->ID) }}" class="btn rounded-0 shadow" style="background:#00688B;color:white">Đặt Hàng</a>
					@else
						<button class="btn rounded-0 shadow btn-danger" style="color:white">Hết Hàng</button>
					@endif
					<button class="btn rounded-0 shadow border-danger"><a href="{{ url('themvaoyeuthich/'.$value->ID) }}" class="icon-heart" style="color:red" ></a></button>
					</p>
					</div>
				</div>
			</div>
			
				@endforeach
				</div>
		</div>
		<div class="tab-pane fade" id="BanhBC-just" role="tabpanel" aria-labelledby="profile-tab-just">
			 <div class="row" id="sanpham" style="background:#f9fffd">
			 
			@foreach($banhbanchay as $value)
			
			<div class="col-md-2 justify-content-md-center mt-2 mb-2">
				<div class="card rounded-0 " >
				  <a href="{{ url('/banh/xemchitietbanh/'.$value->ID) }}"><img class="card-img-top rounded-0" style="height:12rem" src="{{ asset('images/'.$value->HinhAnh) }}" alt="Card image cap"></a>
				  <div class="card-body">
					<h6 class="card-title text-primary font-weight-bold text-center" style="text-transform: uppercase;">{{$value->TenBanh}}</h6>
					<h6>
					@for($i=1;$i<=5;$i++)
											@if($i<=$avr1[$value->ID])
											<i class="icon-star" style="color:#FFFF00"></i>
											@else
												
											<i class="icon-star-empty"></i>
											@endif
										@endfor
					</h6>
					@if($value->KhuyenMai==0)
					<h6 class="card-text text-danger font-weight-bold">{{number_format($value->GiaTien)}} VNĐ</h6>
					<p style="height:2px"></p>
					@else
					<h6 class="card-text text-danger font-weight-bold">{{number_format($value->GiaTien-$value->GiaTien*$value->KhuyenMai/100)}} VNĐ</h6>
					<span class="card-text text-secondary font-weight-bold" style=" text-decoration: line-through;">{{number_format($value->GiaTien)}} VNĐ</span> -{{$value->KhuyenMai}}%
					
					@endif
					<p class="card-text text-info font-weight-bold">Loại bánh: {{$value->TenLoai}}</p>
					<p class="text-center">
					<!--<a href="{{ url('/banh/xemchitietbanh/'.$value->ID) }}" class="btn btn-primary rounded-0 shadow">Xem Chi Tiết</a>-->
					@if($value->SoLuong>0)
						<span class="counter">Bán được: {{$value->TongSoLuong}}</span>
					<a href="{{ url('/banh/themgiohang/'.$value->ID) }}" class="btn rounded-0 shadow btn-sm" style="background:#00688B;color:white">Đặt Hàng</a>
				
					
					@else
						<button class="btn rounded-0 shadow btn-danger" style="color:white">Hết Hàng</button>
					@endif
					<button class="btn rounded-0 shadow border-danger btn-sm"><a href="{{ url('themvaoyeuthich/'.$value->ID) }}" class="icon-heart" style="color:red" ></a></button>
					
				
					</p>
					</div>
				</div>
				
			</div>
			
				@endforeach
				</div>
		</div>
		<div class="tab-pane fade" id="BanhKM-just" role="tabpanel" aria-labelledby="contact-tab-just">
					<div class="row" id="sanpham" style="background:#f9fffd">
			@foreach($banhkhuyenmai as $value)
			<div class="col-md-2 justify-content-md-center mt-2 mb-2">
				<div class="card rounded-0 " >
				  <a href="{{ url('/banh/xemchitietbanh/'.$value->ID) }}"><img class="card-img-top rounded-0" style="height:12rem" src="{{ asset('images/'.$value->HinhAnh) }}" alt="Card image cap"></a>
				  <div class="card-body">
					<h6 class="card-title text-primary font-weight-bold text-center" style="text-transform: uppercase;">{{$value->TenBanh}}</h6>
					<h6>
					@for($i=1;$i<=5;$i++)
											@if($i<=$avr1[$value->ID])
											<i class="icon-star" style="color:#FFFF00"></i>
											@else
												
											<i class="icon-star-empty"></i>
											@endif
										@endfor
					</h6>
					@if($value->KhuyenMai==0)
					<h6 class="card-text text-danger font-weight-bold">{{number_format($value->GiaTien)}} VNĐ</h6>
					<p style="height:2px"></p>
					@else
					<h6 class="card-text text-danger font-weight-bold">{{number_format($value->GiaTien-$value->GiaTien*$value->KhuyenMai/100)}} VNĐ</h6>
					<span class="card-text text-secondary font-weight-bold" style=" text-decoration: line-through;">{{number_format($value->GiaTien)}} VNĐ</span> -{{$value->KhuyenMai}}%
					
					@endif
					<p class="card-text text-info font-weight-bold">Loại bánh: {{$value->TenLoai}}</p>
					<p class="text-center">
					<!--<a href="{{ url('/banh/xemchitietbanh/'.$value->ID) }}" class="btn btn-primary rounded-0 shadow">Xem Chi Tiết</a>-->
					@if($value->SoLuong>0)
					<a href="{{ url('/banh/themgiohang/'.$value->ID) }}" class="btn rounded-0 shadow" style="background:#00688B;color:white">Đặt Hàng</a>
					@else
						<button class="btn rounded-0 shadow btn-danger" style="color:white">Hết Hàng</button>
					@endif
					<button class="btn rounded-0 shadow border-danger"><a href="{{ url('themvaoyeuthich/'.$value->ID) }}" class="icon-heart" style="color:red" ></a></button>
					</p>
					</div>
				</div>
			</div>
			
				@endforeach
				</div>
					
		
		</div>
		@php $giatrikhuyen=5 @endphp
		@while($giatrikhuyen<=50)
		  <div class="tab-pane fade" id="BanhKM-{{$giatrikhuyen}}" role="tabpanel" aria-labelledby="contact-tab-just">
					<div class="row"  style="background:#f9fffd">
			@foreach($banhkhuyenmai as $value)
			@if($value->KhuyenMai==$giatrikhuyen)
			<div class="col-md-2 justify-content-md-center mt-2 mb-2">
				<div class="card rounded-0 " >
				  <a href="{{ url('/banh/xemchitietbanh/'.$value->ID) }}"><img class="card-img-top rounded-0" style="height:12rem" src="{{ asset('images/'.$value->HinhAnh) }}" alt="Card image cap"></a>
				  <div class="card-body">
					<h6 class="card-title text-primary font-weight-bold text-center" style="text-transform: uppercase;">{{$value->TenBanh}}</h6>
					<h6>
					@for($i=1;$i<=5;$i++)
											@if($i<=$avr1[$value->ID])
											<i class="icon-star" style="color:#FFFF00"></i>
											@else
												
											<i class="icon-star-empty"></i>
											@endif
										@endfor
					</h6>
					@if($value->KhuyenMai==0)
					<h6 class="card-text text-danger font-weight-bold">{{number_format($value->GiaTien)}} VNĐ</h6>
					<p style="height:2px"></p>
					@else
					<h6 class="card-text text-danger font-weight-bold">{{number_format($value->GiaTien-$value->GiaTien*$value->KhuyenMai/100)}} VNĐ</h6>
					<span class="card-text text-secondary font-weight-bold" style=" text-decoration: line-through;">{{number_format($value->GiaTien)}} VNĐ</span> -{{$value->KhuyenMai}}%
					
					@endif
					<p class="card-text text-info font-weight-bold">Loại bánh: {{$value->TenLoai}}</p>
					<p class="text-center">
					<!--<a href="{{ url('/banh/xemchitietbanh/'.$value->ID) }}" class="btn btn-primary rounded-0 shadow">Xem Chi Tiết</a>-->
					@if($value->SoLuong>0)
					<a href="{{ url('/banh/themgiohang/'.$value->ID) }}" class="btn rounded-0 shadow" style="background:#00688B;color:white">Đặt Hàng</a>
					@else
						<button class="btn rounded-0 shadow btn-danger" style="color:white">Hết Hàng</button>
					@endif
					<button class="btn rounded-0 shadow border-danger"><a href="{{ url('themvaoyeuthich/'.$value->ID) }}" class="icon-heart" style="color:red" ></a></button>
					</p>
					</div>
				</div>
			</div>
				@endif
				@endforeach
				</div>
					
		
		</div>
		 
		  @php $giatrikhuyen+=5 @endphp
		 @endwhile
		<div class="tab-pane fade" id="BanhTheoLoai-just" role="tabpanel" aria-labelledby="contact-tab-just">
			 <div class="row" id="sanpham" style="background:#f9fffd">
			@foreach($banhmoi as $value)
			<div class="col-md-2 justify-content-md-center mt-2 mb-2">
				<div class="card rounded-0 " >
				  <a href="{{ url('/banh/xemchitietbanh/'.$value->ID) }}"><img class="card-img-top rounded-0" style="height:12rem" src="{{ asset('images/'.$value->HinhAnh) }}" alt="Card image cap"></a>
				  <div class="card-body">
					<h6 class="card-title text-primary font-weight-bold text-center" style="text-transform: uppercase;">{{$value->TenBanh}}</h6>
					<h6>
					@for($i=1;$i<=5;$i++)
											@if($i<=$avr1[$value->ID])
											<i class="icon-star" style="color:#FFFF00"></i>
											@else
												
											<i class="icon-star-empty"></i>
											@endif
										@endfor
					</h6>
					@if($value->KhuyenMai==0)
					<h6 class="card-text text-danger font-weight-bold">{{number_format($value->GiaTien)}} VNĐ</h6>
					<p style="height:2px"></p>
					@else
					<h6 class="card-text text-danger font-weight-bold">{{number_format($value->GiaTien-$value->GiaTien*$value->KhuyenMai/100)}} VNĐ</h6>
					<span class="card-text text-secondary font-weight-bold" style=" text-decoration: line-through;">{{number_format($value->GiaTien)}} VNĐ</span> -{{$value->KhuyenMai}}%
					
					@endif
					<p class="card-text text-info font-weight-bold">Loại bánh: {{$value->TenLoai}}</p>
					<p class="text-center">
					<!--<a href="{{ url('/banh/xemchitietbanh/'.$value->ID) }}" class="btn btn-primary rounded-0 shadow">Xem Chi Tiết</a>-->
					@if($value->SoLuong>0)
					<a href="{{ url('/banh/themgiohang/'.$value->ID) }}" class="btn rounded-0 shadow" style="background:#00688B;color:white">Đặt Hàng</a>
					@else
						<button class="btn rounded-0 shadow btn-danger" style="color:white">Hết Hàng</button>
					@endif
					<button class="btn rounded-0 shadow border-danger"><a href="{{ url('themvaoyeuthich/'.$value->ID) }}" class="icon-heart" style="color:red" ></a></button>
					</p>
					</div>
				</div>
			</div>
			
				@endforeach
				</div>
		</div>
		@php $demloai=0; @endphp
		@foreach($loaibanh as $v)
		<div class="tab-pane fade" id="BanhTheoLoai-{{$demloai}}" role="tabpanel" aria-labelledby="contact-tab-just">
			  <div class="row" id="sanpham" style="background:#f9fffd">
			@foreach($banhmoi as $value)
			@if($value->TenLoai==$v->TenLoai)
			<div class="col-md-2 justify-content-md-center mt-2 mb-2">
				<div class="card rounded-0 " >
				  <a href="{{ url('/banh/xemchitietbanh/'.$value->ID) }}"><img class="card-img-top rounded-0" style="height:12rem" src="{{ asset('images/'.$value->HinhAnh) }}" alt="Card image cap"></a>
				  <div class="card-body">
					<h6 class="card-title text-primary font-weight-bold text-center" style="text-transform: uppercase;">{{$value->TenBanh}}</h6>
					<h6>
					@for($i=1;$i<=5;$i++)
											@if($i<=$avr1[$value->ID])
											<i class="icon-star" style="color:#FFFF00"></i>
											@else
												
											<i class="icon-star-empty"></i>
											@endif
										@endfor
					</h6>
					@if($value->KhuyenMai==0)
					<h6 class="card-text text-danger font-weight-bold">{{number_format($value->GiaTien)}} VNĐ</h6>
					<p style="height:2px"></p>
					@else
					<h6 class="card-text text-danger font-weight-bold">{{number_format($value->GiaTien-$value->GiaTien*$value->KhuyenMai/100)}} VNĐ</h6>
					<span class="card-text text-secondary font-weight-bold" style=" text-decoration: line-through;">{{number_format($value->GiaTien)}} VNĐ</span> -{{$value->KhuyenMai}}%
					
					@endif
					<p class="card-text text-info font-weight-bold">Loại bánh: {{$value->TenLoai}}</p>
					<p class="text-center">
					<!--<a href="{{ url('/banh/xemchitietbanh/'.$value->ID) }}" class="btn btn-primary rounded-0 shadow">Xem Chi Tiết</a>-->
					@if($value->SoLuong>0)
					<a href="{{ url('/banh/themgiohang/'.$value->ID) }}" class="btn rounded-0 shadow" style="background:#00688B;color:white">Đặt Hàng</a>
					@else
						<button class="btn rounded-0 shadow btn-danger" style="color:white">Hết Hàng</button>
					@endif
					<button class="btn rounded-0 shadow border-danger"><a href="{{ url('themvaoyeuthich/'.$value->ID) }}" class="icon-heart" style="color:red" ></a></button>
					</p>
					</div>
				</div>
			</div>
				@endif
				
				@endforeach
				</div>
				@php $demloai++; @endphp
		</div>
		@endforeach
		<div class="tab-pane fade" id="LienHe-just" role="tabpanel" aria-labelledby="contact-tab-just">
			  <!-- Section: Contact v.1 -->
			<section class="my-5">

			  <!-- Section heading -->
			  <h2 class="h1-responsive font-weight-bold text-center my-5">Thông Tin Liên Hệ</h2>
			  <!-- Section description -->
			  <p class="text-center w-responsive mx-auto pb-5">Mọi chi tiết thắc mắc, xin vui lòng liên hệ về địa chỉ email: <i class="fa fa-envelope"></i> <a href="#">letrongky0110@gmail.com</a> 
			  hoặc liên hệ trực tiếp SDT: <i class="fa fa-phone-square"></i>+84 35 228 3633</p>

			  <!-- Grid row -->
			  <div class="row">

				<!-- Grid column -->
				<div class="col-lg-5 mb-lg-0 mb-4">

				  <!-- Form with header -->
				 
				  <div class="card">
					<div class="card-body">
					  <!-- Header -->
					  <div class="form-header blue accent-1">
						<h3 class="mt-2"><i class="fa fa-envelope"></i> Gửi Thư Cho Chúng Tôi:</h3>
					  </div>
					  <p class="dark-grey-text">Chúng tôi sẽ trả lời thư cho bạn sau ít phút!! vui lòng điền đủ thông tin chi tiết sau:</p>
					  <!-- Body -->
					   <form action="{{ url('/gopy/them') }}" method="post">
				  {{ csrf_field() }}
					  <div class="md-form">
						<i class="fa fa-user prefix grey-text"></i>
						<input type="text" id="form-name" name="formname" class="form-control">
						@if($errors->has('formname'))
						<p class="text-danger">{{$errors->first('formname')}}</p>
						<script> alert("{{$errors->first('formname')}}")</script>
						@endif
						<label for="form-name">Họ và tên </label>
					  </div>
					  <div class="md-form">
						<i class="fa fa-envelope prefix grey-text"></i>
						<input type="text" id="form-email" name="formemail" class="form-control">
						@if($errors->has('formemail'))
						<p class="text-danger">{{$errors->first('formemail')}}</p><script> alert("{{$errors->first('formemail')}}")</script>
						@endif
						<label for="form-email">Email</label>
					  </div>
					  <div class="md-form">
						<i class="fa fa-tag prefix grey-text"></i>
						<input type="text" id="form-Subject" name="formSubject" class="form-control">
						@if($errors->has('formSubject'))
						<p class="text-danger">{{$errors->first('formSubject')}}</p><script> alert("{{$errors->first('formSubject')}}")</script>
						@endif
						<label for="form-Subject">Tiêu đề</label>
					  </div>
					  <div class="md-form">
						<i class="fa fa-pencil prefix grey-text"></i>
						<textarea type="text" id="formtext" name="formtext" class="form-control md-textarea" rows="3"></textarea>
						@if($errors->has('formtext'))
						<p class="text-danger">{{$errors->first('formtext')}}</p><script> alert("{{$errors->first('formtext')}}")</script>
						@endif
						<label for="form-text">Thông tin đóng góp or thắt mắt cần giải đáp</label>
					  </div>
					  
					  <div class="text-center">
						<button class="btn btn-light-blue" type="submit">Gửi</button>
					  </div>
					   </form>
					</div>
				  </div>
				 
				  <!-- Form with header -->

				</div>
				<!-- Grid column -->

				<!-- Grid column -->
				<div class="col-lg-7">

				  <!--Google  map-->
				  <div id="map-container-section" class="z-depth-1-half map-container-section mb-4" style="height: 400px">
					  <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d981.145083556896!2d105.43248144750156!3d10.375401023326111!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1zY8OgIHBow6ogbmd1ecOqbiBoxrDGoW5nIGxvbmcgeHV5w6puIGFuIGdpYW5n!5e0!3m2!1svi!2s!4v1544546234287"
					  frameborder="0" style="border:0" allowfullscreen></iframe>
				  </div>
				  <!-- Buttons-->
				  <div class="row text-center">
					<div class="col-md-4">
					  <a class="btn-floating blue accent-1">
						<i class="fa fa-map-marker"></i>
					  </a>
					  <p>Việt Nam</p>
					  <p class="mb-md-0">Nguyên Xá, Hà Nội </p>
					</div>
					<div class="col-md-4">
					  <a class="btn-floating blue accent-1">
						<i class="fa fa-phone"></i>
					  </a>
					  <p>+84 967041245</p>
					  <p class="mb-md-0">Mon - Fri, 8:00-22:00</p>
					</div>
					<div class="col-md-4">
					  <a class="btn-floating blue accent-1">
						<i class="fa fa-envelope"></i>
					  </a>
					  <p>eautcake.com</p>
					  <p class="mb-0">donam17112004@gmail.com</p>
					</div>
				  </div>

				</div>
				<!-- Grid column -->

			  </div>
			  <!-- Grid row -->

			</section>
			<!-- Section: Contact v.1 -->
		</div>
	</div>
	</div>
<!--hiển thị sản phẩm -->


   <!-- logo -->
<div class="row mt-3 justify-content-md-center" style="height:50px;background:#00688B;">
	
	<h3 class="card-header white-text  text-center py-2 " style="background:#00688B">
		<strong>Bánh Mới Nhất</strong>
	</h3>
</div>

<!--hiển thị sản pham khuyen mai-->

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

  <div class="carousel-inner">
	
    <div class="carousel-item active">
	@php $dem=1; @endphp
	<div class="row justify-content-md-center " id="sanpham" >
	@foreach($banhmoi as $value)
	
	@if($dem<=4)
	<div class="col-md-2 justify-content-md-center mt-2 mb-2">
	<div class="card rounded-0 " >
		  <a href="{{ url('/banh/xemchitietbanh/'.$value->ID) }}"><img class="card-img-top rounded-0" style="height:12rem" src="{{ asset('images/'.$value->HinhAnh) }}" alt="Card image cap"></a>
		  <div class="card-body">
			<h6 class="card-title text-primary font-weight-bold text-center" style="text-transform: uppercase;">{{$value->TenBanh}}</h6>
			<h6>
			@for($i=1;$i<=5;$i++)
				@if($i<=$avr1[$value->ID])
				<i class="icon-star" style="color:#FFFF00"></i>
				@else
					
				<i class="icon-star-empty"></i>
				@endif
			@endfor
			</h6>
			@if($value->KhuyenMai==0)
			<h6 class="card-text text-danger font-weight-bold">{{number_format($value->GiaTien)}} VNĐ</h6>
			<p style="height:2px"></p>
			@else
			<h6 class="card-text text-danger font-weight-bold">{{number_format($value->GiaTien-$value->GiaTien*$value->KhuyenMai/100)}} VNĐ</h6>
			<span class="card-text text-secondary font-weight-bold" style=" text-decoration: line-through;">{{number_format($value->GiaTien)}} VNĐ</span> -{{$value->KhuyenMai}}%
			
			@endif
			<p class="card-text text-info font-weight-bold">Loại bánh: {{$value->TenLoai}}</p>
			<p class="text-center">
			<!--<a href="{{ url('/banh/xemchitietbanh/'.$value->ID) }}" class="btn btn-primary rounded-0 shadow">Xem Chi Tiết</a>-->
			@if($value->SoLuong>0)
			<a href="{{ url('/banh/themgiohang/'.$value->ID) }}" class="btn rounded-0 shadow" style="background:#00688B;color:white">Đặt Hàng</a>
			@else
				<button class="btn rounded-0 shadow btn-danger" style="color:white">Hết Hàng</button>
			@endif
			<button class="btn rounded-0 shadow border-danger"><a href="{{ url('themvaoyeuthich/'.$value->ID) }}" class="icon-heart" style="color:red" ></a></button>
			</p>
		  </div>
		</div>
	</div>
	@endif
	@php $dem++; @endphp
	@endforeach
	</div>
	</div>
	
    @php $dem=0 ;@endphp
	@foreach($banhmoi as $value)
	
	@if($dem>=4)
	@if($dem%4==0)
    <div class="carousel-item">
	<div class="row justify-content-md-center" id="sanpham" >
	@php $dem2=0; @endphp
	@endif
	@php $dem2++; @endphp
	<div class="col-md-2 justify-content-md-center mt-2 mb-2">
	<div class="card rounded-0 " >
		  <a href="{{ url('/banh/xemchitietbanh/'.$value->ID) }}"><img class="card-img-top rounded-0" style="height:12rem" src="{{ asset('images/'.$value->HinhAnh) }}" alt="Card image cap"></a>
		  <div class="card-body">
			<h6 class="card-title text-primary font-weight-bold text-center" style="text-transform: uppercase;">{{$value->TenBanh}}</h6>
			<h6>
			@for($i=1;$i<=5;$i++)
									@if($i<=$avr1[$value->ID])
									<i class="icon-star" style="color:#FFFF00"></i>
									@else
										
									<i class="icon-star-empty"></i>
									@endif
								@endfor
			</h6>
			@if($value->KhuyenMai==0)
			<h6 class="card-text text-danger font-weight-bold">{{number_format($value->GiaTien)}} VNĐ</h6>
			<p style="height:2px"></p>
			@else
			<h6 class="card-text text-danger font-weight-bold">{{number_format($value->GiaTien-$value->GiaTien*$value->KhuyenMai/100)}} VNĐ</h6>
			<span class="card-text text-secondary font-weight-bold" style=" text-decoration: line-through;">{{number_format($value->GiaTien)}} VNĐ</span> -{{$value->KhuyenMai}}%
			
			@endif
			<p class="card-text text-info font-weight-bold">Loại bánh: {{$value->TenLoai}}</p>
			<p class="text-center">
			<!--<a href="{{ url('/banh/xemchitietbanh/'.$value->ID) }}" class="btn btn-primary rounded-0 shadow">Xem Chi Tiết</a>-->
			@if($value->SoLuong>0)
			<a href="{{ url('/banh/themgiohang/'.$value->ID) }}" class="btn rounded-0 shadow" style="background:#00688B;color:white">Đặt Hàng</a>
			@else
				<button class="btn rounded-0 shadow btn-danger" style="color:white">Hết Hàng</button>
			@endif
			<button class="btn rounded-0 shadow border-danger"><a href="{{ url('themvaoyeuthich/'.$value->ID) }}" class="icon-heart" style="color:red" ></a></button>
			</p>
		  </div>
		</div>
	</div>
	@if($dem2%4==0||$dem==count($banhmoi)-1)
    </div>
	</div>
	@endif
	@endif
	@php $dem++; @endphp
	@endforeach

  </div>{{-- END carousel-inner --}}

  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>

</div>{{-- END carousel --}}
<div class="row justify-content-md-center bg-white">
        <!-- Title -->
        <div class="col-sm-12 mt-3">
            <div class="title-container sm text-left">
                <div class="title-wrap text-center">
                    <h2 class="title">Thông tin về Cửa Hàng Bánh</h2>
                </div>
            </div>
        </div>
        <!-- Title -->
        <div class="col-sm-6 col-md-2 bg-success mr-2 mt-2 mb-3" style="padding:20px">
            <!-- Count Block -->
            <div style="">
                <h5  class="font-weight-bold ">Lượt Mua Hàng</h5>
				<p></p>
                <h3><span class="timer" data-speed="500" data-to="{{$a[0]}}"></span>
				
                <i class="icon-shopping-cart ml-4" style="float:right"></i></h3>
            </div><!-- Counter Block -->
        </div><!-- Column -->
		<div class="col-sm-6 col-md-2 bg-warning mr-2 mt-2 mb-3" style="padding:20px">
            <!-- Count Block -->
            <div style="">
                <h5  class="font-weight-bold" >Đánh Giá 5 Sao</h5>
				<p></p>
                <h3><span class="timer" data-speed="100" data-to="{{$a[1]}}"></span>
				
                <i class="icon-star ml-4" style="float:right"></i></h3>
            </div><!-- Counter Block -->
        </div><!-- Column -->
        <div class="col-sm-6 col-md-2 bg-info mr-2 mt-2 mb-3" style="padding:20px">
            <!-- Count Block -->
            <div style="">
                <h5  class="font-weight-bold" >Bánh Bán Được</h5>
				<p></p>
                <h3><span class="timer" data-speed="500" data-to="{{$a[2]}}"></span>
				
                <i class="icon-usd ml-4" style="float:right"></i></h3>
            </div><!-- Counter Block -->
        </div><!-- Column -->
		<div class="col-sm-6 col-md-2 mt-2 mb-3" style="padding:20px;background:pink">
            <!-- Count Block -->
            <div style="">
                <h5  class="font-weight-bold" >Thành Viên</h5>
				<p></p>
                <h3><span class="timer" data-speed="500" data-to="{{$a[3]}}"></span>
				
                <i class="icon-group ml-4 " style="float:right"></i></h3>
            </div><!-- Counter Block -->
        </div><!-- Column -->
 </div>
<div class="sticky-top"><a href="#head"><h1 class="icon-chevron-sign-up"></h1></a></div>
<style>
.card:hover{
    -webkit-box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
    -moz-box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
    box-shadow: -1px 9px 40px -12px rgba(0, 0, 0, 0.75);
}
.map-container-section {
  overflow:hidden;
  padding-bottom:56.25%;
  position:relative;
  height:0;
}
.map-container-section iframe {
  left:0;
  top:0;
  height:100%;
  width:100%;
  position:absolute;
}

/* Fix carousel */
#carouselExampleControls { position: relative; }
.carousel-control-prev, .carousel-control-next {
    width: 40px !important;
    height: 40px !important;
    background: rgba(0,104,139,0.7) !important;
    border-radius: 50% !important;
    top: 50% !important;
    transform: translateY(-50%) !important;
    opacity: 1 !important;
}
.carousel-control-prev { left: 10px !important; }
.carousel-control-next { right: 10px !important; }

/* Fix pagination */
.pagination {
    display: flex !important;
    flex-direction: row !important;
    flex-wrap: wrap !important;
    justify-content: center !important;
    align-items: center !important;
    list-style: none;
    padding: 15px 0 !important;
    margin: 0 !important;
    gap: 4px;
}
.pagination li { display: inline-block !important; }
.pagination li a, .pagination li span {
    display: inline-block;
    padding: 6px 14px !important;
    border: 1px solid #dee2e6 !important;
    border-radius: 6px !important;
    color: #00688B !important;
    text-decoration: none;
    font-size: 14px;
}
.pagination li.active span {
    background: #00688B !important;
    color: white !important;
    border-color: #00688B !important;
}

/* Fix promo images */
.promo-box img { width: 100% !important; height: 170px !important; object-fit: cover; }
.card-img-top { object-fit: cover; }
</style>

@endsection
