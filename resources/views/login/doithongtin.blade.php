@extends('layouts.app')

@section('content')
	<br></br>			
	<br></br>
	<div class="row justify-content-md-center">
	<div class="col-md-8 text-center">
	
	<div class="card">
		<!-- Material form login -->
			<div class="card"style="padding-bottom:5px;">

			  <h5 class="card-header info-color white-text text-center py-4">
				<strong>Cập Nhật Thông Tin</strong>
			  </h5>

			  <!--Card content-->
			  <div class="card-body px-lg-5 pt-0">

				<!-- Form -->
				<form class="text-center" style="color: #757575;"action="{{ url('/laythongtin/capnhatthongtin') }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}

				    <div class="col">
						<!-- First name -->
						<div class="md-form">
							<input type="text" id="materialRegisterFormFirstName" class="form-control" name="hoten" value="{{$thongtin->HoTen}}" required>
							<label for="materialRegisterFormFirstName"style="padding-bottom:5px">Nhập Họ Và Tên</label>
						</div>
					</div>
					<div class="col">
						<!-- First name -->
						<div class="md-form">
							<input type="number" id="materialRegisterFormFirstName" class="form-control" name="sdt" value="{{$thongtin->SDT}}"  required>
							<label for="materialRegisterFormFirstName"style="padding-bottom:5px">Số Điện Thoại</label>
							@if(isset($sdt))
							  <p class="text-danger" style="float:left">Số điện thoại đã tồn tại</p>	
							@endif
						</div>
					</div>
					<div class="col">
						<!-- First name -->
						<div class="md-form">
							<input type="email" id="materialRegisterFormFirstName" class="form-control" name="email" value="{{$thongtin->Email}}" required>
							<label for="materialRegisterFormFirstName"style="padding-bottom:5px">Email</label>
							@if(isset($gm))
							  <p class="text-danger" style="float:left">Email đã tồn tại</p>
							@endif
						</div>
					</div>
					<div class="col">
						<!-- First name -->
						<div class="md-form">
							<input type="text" id="materialRegisterFormFirstName" class="form-control" name="diachi"  value="{{$thongtin->DiaChi}}" required>
							<label for="materialRegisterFormFirstName"style="padding-bottom:5px">Địa Chỉ</label>
							@if(isset($gm))
							  <p class="text-danger" style="float:left">Email đã tồn tại</p>	
							@endif
						</div>
					</div>
				  <!-- Sign in button -->
				  <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Cập Nhật</button>
				</form>
				<!-- Form -->
			  </div>

			</div>
			<!-- Material form login -->
	</div>
	
	</div>
	</div>
	<br></br>

@endsection
	
