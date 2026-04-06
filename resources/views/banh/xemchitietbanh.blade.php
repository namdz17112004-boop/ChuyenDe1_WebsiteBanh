@extends('layouts.app')

@section('content')
	<div class="row"><div class="mt-3"></div></div>
	<div class="row">
	<div class="col-md-12">
	<div class="card">
		<div class="card-header text-light" style="background:#00688B;color:white"><h5>Chi Tiết {{$banh->TenBanh}}</h5></div>
		<div class="card-body justify-content-md-center">	
			<div class="row">
				<div class="col-md-8 border-right">
					<div class="row" >
						<div class="col-md-9" style="height:360px">
							<img src="{{ asset('images/'.$banh->HinhAnh) }}" style="width:550px; height:360px"></img>
						</div>
						<div class="col-md-3">
								<h2><span class="text-danger">{{round($avg)}}</span>/5</h2>
								<h4>
								@for($i=1;$i<=5;$i++)
									@if($i<=round($avg))
									<i class="icon-star" style="color:#FFFF00"></i>
									@else
										
									<i class="icon-star-empty"></i>
									@endif
								@endfor
								</h4>
								<p style="height:40px"></p>
							
								@if($banh->KhuyenMai==0)
								<h4 class="card-text text-danger font-weight-bold">{{number_format($banh->GiaTien)}} VNĐ</h4>
								<p style="height:2px"></p>
								@else
								<h4 class="card-text text-danger font-weight-bold">{{number_format($banh->GiaTien-$banh->GiaTien*$banh->KhuyenMai/100)}} VNĐ</h4>
								<span class="card-text text-secondary font-weight-bold" style=" text-decoration: line-through;">{{number_format($banh->GiaTien)}} VNĐ</span> -{{$banh->KhuyenMai}}%

								@endif
								
								<p class="card-text text-info font-weight-bold">Loại bánh: {{$banh->TenLoai}}</p>
								<p class="card-text text-success font-weight-bold">Số lượng: {{$banh->SoLuong}} Cái</p>
							<a href="{{ url('/banh/themgiohang/'.$banh->ID) }}" class="btn rounded-0 shadow" style="background:#00688B;color:white">Đặt Hàng</a>
						</div>
					</div>
					<h1 class="bg-info text-center rounded mt-2">Thông Tin</h1>
					<br></br>
					<br></br>
					{!! $banh->NoiDung !!}
				</div>
				<div class="col-md-4 ">
					<div class="row justify-content-md-center">
					<h4 class="col mt-3">Bình luận</h4>
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#binhluan">
						Viết Bình Luận
					</button>
					</div>
					
					@foreach($binhluan as $value)
					<div class="row mt-2"><div class="col-md-12"><span class="badge badge-secondary">{{$value->Ten}}</span>
					@for($i=1;$i<=5;$i++)
									@if($i<=$value->Diem)
									<i class="icon-star" style="color:#FFFF00"></i>
									@else
										
									<i class="icon-star-empty"></i>
									@endif
								@endfor
					</div></div>
					<div class="row mt-2 justify-content-md-center"><div class="col-md-10">{{$value->LoiBinh}}</div></div>
					<div class="row mt-2"><div class="col-md-12 text-right"><span class=" bg-info rounded">Ngày: {{$value->ThoiGian}}<span></div></div>
					@if(Session::has('user'))
						@if(Session::get('quyenhan')!=0)
						<a href="{{ url('/banh/xoabinhluan/'.$value->ID).'/'.$value->Banh }}"><h5><i class="icon-collapse-alt text-danger"></i></h5></a>
						@endif
					@endif
					<hr>
					
					@endforeach
					<!-- Modal -->
					<form class="was-validated" action="{{ url('/banh/thembinhluan') }}" method="post" >
					{{ csrf_field() }}
					<input type="hidden" name="banh" value="{{$banh->ID}}"/>
					<div class="modal fade" id="binhluan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Viết Bình Luận</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
						  </div>
						  <div class="modal-body">
							<h4>Đánh giá</h4>
							<div class="stars">		  
									<input class="star star-5" id="star-5" type="radio" name="star" value="5"/>
									<label class="star star-5" for="star-5"></label>
									<input class="star star-4" id="star-4" type="radio" name="star" value="4"/>
									<label class="star star-4" for="star-4"></label>
									<input class="star star-3" id="star-3" type="radio" name="star" value="3"/>
									<label class="star star-3" for="star-3"></label>
									<input class="star star-2" id="star-2" type="radio" name="star"value="2"/>
									<label class="star star-2" for="star-2"></label>
									<input class="star star-1" id="star-1" type="radio" name="star"value="1"/>
									<label class="star star-1" for="star-1"></label>			  
							</div>
						  </div>
						  <div class="modal-body">
							<h4 class="mb-3">Tên người đánh giá</h4>
							<input id="ten" type="text" name="ten"  class="form-control" required="true"/>
						  </div>
						  <div class="modal-body">
							<h4 class="mb-3">Lời bình</h4>
							<textarea type="textarea" name="noidung" class="form-control" required="true"></textarea>
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
							<button type="submit" class="btn btn-primary">Gửi bình luận</button>
						  </div>
						</div>
					  </div>
					</div>
					</form>
				</div>
			</div>
			
		</div>
	</div>
	</div>
	</div>
		<style>
			div.stars {
		  width: 270px;
		  display: inline-block;
		}
		 
		input.star { display: none; }
		 
		label.star {
		  float: right;
		  padding: 10px;
		  font-size: 36px;
		  color: #444;
		  transition: all .2s;
		}
		 
		input.star:checked ~ label.star:before {
		  content: '\f005';
		  color: #FD4;
		  transition: all .25s;
		}
		 
		input.star-5:checked ~ label.star:before {
		  color: #FE7;
		  text-shadow: 0 0 20px #952;
		}
		 
		input.star-1:checked ~ label.star:before { color: #F62; }
		 
		label.star:hover { transform: rotate(-15deg) scale(1.3); }
		 
		label.star:before {
		  content: '\f006';
		  font-family: FontAwesome;
		}
		</style>
	
@endsection
