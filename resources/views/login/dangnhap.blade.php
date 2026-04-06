@extends('layouts.app')

@section('content')
	<br></br>		
	<br></br>
	<div class="row justify-content-md-center">
	<div class="col-md-8 text-center">
	
	<div class="card">
		
	<!-- Material form login -->
		<div class="card">

		  <h5 class="card-header info-color white-text text-center py-4">
			<strong>ĐĂNG NHẬP</strong>
		  </h5>

		  <!--Card content-->
		  <div class="card-body px-lg-5 pt-0">

			<!-- Form -->
			<form class="text-center" style="color: #757575;"action="{{ url('/dangnhap/dienthongtin') }}" method="post">{{ csrf_field() }}

			  <!-- tên đăng nhập -->
			  <div class="md-form">
				<input type="text" id="materialRegisterFormFirstName" class="form-control" name="tendangnhap" required>
                        <label for="materialRegisterFormFirstName"style="padding-bottom:5px">Tên đăng nhập hoặc Email Hoặc SĐT(*)</label>
			  </div>
			  

			  <!-- Password -->
			  <div class="md-form">
				<input type="password" id="materialLoginFormPassword" class="form-control" name="matkhau" required>
				<label for="materialLoginFormPassword"style="padding-bottom:5px">Nhập Mật Khẩu</label>
			  </div>
			  @if(isset($kt))
			  <p class="text-danger">Tên tài khoản hoặc mật khẩu không khớp</p>
			@endif

			

			  <!-- Sign in button -->
			  <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" >Đăng Nhập</button>
			  <!-- Register -->
			  <p>Nếu Chưa Có Tài Khoản?
				<a href="{{ url('/dangky') }}">Đăng Ký</a>
			  </p>

			  <!-- Social login -->
			  <!--
			  <p>or sign in with:</p>
			  <a type="button" class="btn-floating btn-fb btn-sm">
				<i class="fa fa-facebook"></i>
			  </a>
			  <a type="button" class="btn-floating btn-tw btn-sm">
				<i class="fa fa-twitter"></i>
			  </a>
			  <a type="button" class="btn-floating btn-li btn-sm">
				<i class="fa fa-linkedin"></i>
			  </a>
			  <a type="button" class="btn-floating btn-git btn-sm">
				<i class="fa fa-github"></i>
			  </a>-->

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
	
