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
				<strong>Đổi Mật Khẩu</strong>
			  </h5>

			  <!--Card content-->
			  <div class="card-body px-lg-5 pt-0">

				<!-- Form -->
				<form class="text-center" style="color: #757575;"action="{{ url('/doimatkhau/dienthongtin') }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}

				  <!-- Email -->
				  <div class="md-form"style="padding-bottom:5px;">
					<input type="password" id="materialLoginFormPassword" class="form-control"name="matkhaucu" required>
					<label for="materialLoginFormPassword"style="padding-bottom:2px;">Mật khẩu cũ(*)</label>
					@if(isset($dn))
					  <p class="text-danger" style="float:left">Mật khẩu cũ không đúng</p>	
					@endif
				  </div>

				  <!-- Password -->
				  <div class="md-form">
					<input type="password" id="materialLoginFormPassword" class="form-control"name="matkhau" required>
					<label for="materialLoginFormPassword"style="padding-bottom:2px;">Mật khẩu mới(*)</label>
				  </div>
				  <div class="md-form">
					<input type="password" id="materialLoginFormPassword" class="form-control"name="nhaplaimatkhau" required>
					<label for="materialLoginFormPassword"style="padding-bottom:2px;">Nhập lại mật khẩu mới(*)</label>
					@if(isset($mk))
					  <p class="text-danger" style="float:left">Mật khẩu không khớp</p>	
					@endif
				  </div>

				  

				  <!-- Sign in button -->
				  <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Đổi mật khẩu</button>
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
	
