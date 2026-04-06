@extends('layouts.app')

@section('content')
	<div class="row"><div class="mt-3"></div></div>
	<div class="row">
	<div class="col-md-12">
	<div class="card">
		<div class="card-header text-light" style="background:#00688B"><h3>Thống kê</h3></div>
		<div class="card-body justify-content-md-center text-center">	
		<div class="row justify-content-md-center">
		<h1 class="mb-4" >Biểu Đồ Thống Kê Bánh Bán Được Ngày Hôm Nay</h1>
			<div class="col-10" style="background:#00688B">
				
				<div class="row">
					<div class="col-6">
						<h3 class="text-white">Số lượng bán được nhiều</h3>
						  <div class="card" >
							<div class="card-body justify-content-md-center text-center">	
								<canvas id="myChart" width="400" height="300"canvas>
							</div>
						  </div>
					</div>
					<div class="col-6">
						<h3 class="text-white">Gía bán được nhiều</h3>
						  <div class="card" >
							<div class="card-body justify-content-md-center text-center">	
								<canvas id="polarArea" width="400"canvas height="300">
							</div>
						  </div>
					</div>
				</div>
				<h1 id="list-item-2" class="text-white mt-2">Biểu Đồ thống kê người dùng mua trong ngày</h1>
				  <div class="card">
					<div class="card-body justify-content-md-center text-center">	
							<canvas id="myBar" width="400" height="100"></canvas>
					</div>
				  </div>
						
				</div>
				
			</div>
			<br></br>
		
		<div class="row justify-content-md-center text-center mt-4" id="list-item-3">
			<h1>Thống Kê Số Liệu</h1>
		</div>
		<form action="{{ url('thongke/hienthi') }}" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
			{{ csrf_field() }}
		<div class="row justify-content-md-center text-center mt-4" id="list-item-3">
			<div class="input-group-prepend">
				<label  class="mr-4 ml-3 col-form-label col-form-label-lg">Từ Ngày:</label>
				<input class="col-md-7 form-control" type="date" id="tungay" name="tungay"  class="from-control border"/> 
			</div>
			<div class="input-group-prepend">
				<label  class="mr-4 ml-3 col-form-label col-form-label-lg">Đến Ngày:</label>
				<input class="col-md-7 form-control" type="date" id="denngay" name="denngay" class="from-control border"/>
			</div>
			 
		</div>
		<div class="row justify-content-md-center text-center mt-4" id="list-item-3">
			<div class="custom-control custom-radio custom-control-inline">
			  <input type="radio" id="customRadioInline1" name="kiemtra" class="custom-control-input" value="1" checked="true">
			  <label class="custom-control-label" for="customRadioInline1">Khách Hàng</label>
			</div>
			<div class="custom-control custom-radio custom-control-inline">
			  <input type="radio" id="customRadioInline2" name="kiemtra" class="custom-control-input" value="2">
			  <label class="custom-control-label" for="customRadioInline2">Bánh</label>
			</div>
		</div>
		<div class="row justify-content-md-center text-center mt-4" id="list-item-3">
			<button type="submit" >Thống Kê</button>
		</div>
		</form>
		@if(isset($thongke))
		<div class="row justify-content-md-center text-center mt-4" id="list-item-3">
			<h3>Bảng Thống Kê Từ Ngày {{$tungay}} Đến Ngày {{$denngay}}</h3>
		</div>
		<div class="row justify-content-md-center text-center mt-4" id="list-item-3">
		<div class="col-9">
				<table id="myTable" class="table table-bordered table-hover table-light table-md table-responsive text-center">
							@if($kt==0)
								<thead>
								<tr>
									
									<td width="10%">Tên Bánh</td>
									<td width="30%">Tổng Số Lượng Bán Được</td>	
									<td width="40%">Tổng Giá Tiền Bán Được</td>
									
								</tr>
								</thead>
								<tbody>
								
								@foreach($thongke as $value)
									<tr>
										
										<td>{{$value->TenBanh}}</td>
										<td>{{$value->soluongtong}} Cái</td>
										<td>{{number_format($value->giatientong)}} VNĐ</td>
									
									</tr>
								@endforeach
								</tbody>
							@else
								<thead>
								<tr>
									
									<td width="10%">Tên KH</td>
									<td width="30%">Tổng Số Lượng Mua</td>	
									<td width="40%">Tổng Giá Tiền </td>
									
								</tr>
								</thead>
								<tbody>
								
								@foreach($thongke as $value)
									<tr>
										
										<td>{{$value->TenKhachHang}}</td>
										<td>{{$value->soluongtong}} Cái</td>
										<td>{{number_format($value->giatientong)}} VNĐ</td>
									
									</tr>
								@endforeach
								</tbody>
							@endif

				</table>
		</div>
		</div>
		<div class="row justify-content-md-center text-center mt-4" id="list-item-3">
			<a href="{{ url('thongke/xuatfile/'.$kt.'/'.$tungay.'/'.$denngay)}}"><button>Xuất file ecxel</button></a>
		</div>
		@endif
		</div>
	</div>
	</div>
	</div>
	<br>
@endsection
