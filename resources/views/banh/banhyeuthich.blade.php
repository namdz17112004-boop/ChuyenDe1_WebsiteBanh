@extends('layouts.app')

@section('content')
	<br></br>		
	
	<br></br>
	<div class="row justify-content-md-center">
	<div class="col-md-10 text-center">
	
	<div class="card">
	<br></br>
	 <h1 class="font-weight-bold" style="color:#FF3333">Bánh yêu thích</h1>
	 <br></br>
		 <div class="row justify-content-md-center">
				@foreach($banh as $value)
				<div class="col-md-3 justify-content-md-center mt-2 ml-2 mb-2">
					<div class="card rounded-0 " >
						  <a href="{{ url('/banh/xemchitietbanh/'.$value->ID) }}"><img class="card-img-top rounded-0" style="height:12rem" src="{{ asset('images/'.$value->HinhAnh) }}" alt="Card image cap"></a>
						  <div class="card-body">
							<h6 class="card-title text-primary font-weight-bold text-center" style="text-transform: uppercase;">{{$value->TenBanh}}</h6>
							<p class="card-text text-danger font-weight-bold">Giá tiền: {{number_format($value->GiaTien)}} VNĐ</p>
							<p class="text-center">
							<!--<a href="{{ url('/banh/xemchitietbanh/'.$value->ID) }}" class="btn btn-primary rounded-0 shadow">Xem Chi Tiết</a>-->
							@if($value->SoLuong>0)
							<a href="{{ url('/banh/themgiohang/'.$value->ID) }}" class="btn rounded-0 shadow" style="background:#00688B;color:white">Đặt Hàng</a>
							@else
								<button class="btn rounded-0 shadow btn-danger" style="color:white">Hết Hàng</button>
							@endif
							<br></br>
							<a href="{{ url('xoabanhyeuthich/'.$value->ID) }}"><button class="btn rounded-0 shadow icon-remove-sign" style="color:#ECAB53"></button></a>
							</p>
						  </div>
						</div>
					</div>
				@endforeach
		 </div>
	<a href="{{ url('/') }}" style="color:#00688B"><button class="rounded-0">Về trang chủ</button></a>
	
	<br></br>
	</div>
	
	</div>
	</div>
	<br></br>

@endsection
	
