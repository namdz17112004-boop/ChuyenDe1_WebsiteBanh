@extends('layouts.app')

@section('content')
<br></br>
<div class="row"><div class="mt-1"></div></div>
<div class="row">
	<div class="col-md-12">
	<div class="card">
		<div class="card-header text-light"style="background:#004f3d"><h5>Thông Tin Khách Hàng</h5></div>
		<div class="card-body justify-content-md-center">	
			<form action="{{ url('dathang/themdonhang') }}" method="post">
			{{ csrf_field() }}
				<div class="form-group">
					<label><h5 class="mb-2">Nhập Họ Và Tên</h5></label>
					<input type="text" class="form-control 	rounded-0" id="hoten" name="hoten" required value="@if(isset($thongtin)){{$thongtin->HoTen}}@endif">
				</div>
				<div class="form-group">
					<label><h5 class="mb-2">Nhập Số Điện Thoại</h5></label>
					<input type="number" class="form-control rounded-0" id="sdt" name="sdt" required value="@if(isset($thongtin)){{$thongtin->SDT}}@endif">
				</div>
					<div class="form-group">
					<label><h5 class="mb-2">Nhập Email</h5></label>
					<input type="email" class="form-control rounded-0" id="email" name="email" aria-describedby="emailHelp" value="@if(isset($thongtin)){{$thongtin->Email}}@endif">
				</div>
				<div class="form-group">
					<label><h5 class="mb-2">Địa Chỉ</h5></label>
					<textarea class="form-control" id="diachi" name="diachi" required value="">@if(isset($thongtin)){{$thongtin->DiaChi}}@endif</textarea>
				</div>
				
		
			<div class="form-group text-center">
					<button type="submit"role="button"	>Đặt Hàng</button>
			</div>
			</form>
		</div>
	</div>
	</div>
</div>
<br></br>
	
@endsection
