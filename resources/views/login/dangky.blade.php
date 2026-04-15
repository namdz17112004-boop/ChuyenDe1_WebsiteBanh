@extends('layouts.app')

@section('content')
	<br></br>		
	<br></br>
	<div class="row justify-content-md-center">
	<div class="col-md-8 text-center">
	
		<div class="card">

			<h5 class="card-header info-color white-text text-center py-4">
				<strong>Đăng Ký Tài Khoản</strong>
			</h5>

			<!--Card content-->
			<div class="card-body px-lg-5 pt-0">

				<!-- Form -->
				<form class="text-center" style="color: #757575;" action="{{ url('/dangky/dienthongtin') }}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
					<div class="form-row">
						<div class="col">
							<!-- First name -->
							<div class="md-form">
								<input type="text" id="materialRegisterFormFirstName" class="form-control" name="hoten" required>
								<label for="materialRegisterFormFirstName"style="padding-bottom:5px">Nhập Họ Và Tên</label>
							</div>
						</div>
						<div class="col">
							<!-- Last name -->
							<div class="md-form">
								<input type="text" id="materialRegisterFormLastName" class="form-control" name="tendangnhap" required>
								<label for="materialRegisterFormLastName"style="padding-bottom:5px">Tên Đăng Nhập</label>
								@if(isset($dn))
									<p class="text-danger" style="float:left">Tên đăng nhập đã tồn tại</p>	
								@endif
							</div>
						</div>
					</div>

					<!-- E-mail -->
					<div class="md-form mt-0">
						<input type="email" id="materialRegisterFormEmail" class="form-control" name="email" required>
						<label for="materialRegisterFormEmail"style="padding-bottom:5px">E-mail</label>
						@if(isset($gm))
						  <p class="text-danger" style="float:left">Email đã tồn tại</p>	
						@endif
					</div>

					<!-- Password -->
					
					<div class="form-row">
						<div class="col">
							<!-- mk-->
							<div class="md-form">
								<input type="password" name="matkhau" id="materialRegisterFormPassword" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock"required>
								<label for="materialRegisterFormPassword"style="padding-bottom:5px">Mật Khẩu</label>
							</div>
						</div>
						<div class="col">
							<!-- xác nhận MK -->	
							<div class="md-form">
								<input type="password" name="nhaplaimatkhau" id="materialRegisterFormPassword" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock" required>
								<label for="materialRegisterFormPassword"style="padding-bottom:5px">Nhập Lại Mật Khẩu</label>
								@if(isset($mk))
								  <p class="text-danger" style="float:left">Mật khẩu không khớp</p>
								@endif
							</div>
						</div>
					</div>

					<!-- Phone number -->
					<div class="md-form">
						<input type="number"name="sdt" id="materialRegisterFormPhone" class="form-control" aria-describedby="materialRegisterFormPhoneHelpBlock"required>
<label for="materialRegisterFormPhone" style="padding-bottom:5px">Số Điện Thoại</label>
						@if(isset($sdt))
							<p class="text-danger" style="float:left">Số điện thoại đã tồn tại</p>
						@endif
					</div>

					<!-- Sign up button -->
					<button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Đăng Ký</button>

					<!-- Social register -->
					

					<hr>

					<!-- Terms of service -->
					<p>Bằng cách nhấp vào
						<em>"Đăng Ký"</em> bạn đồng ý với các
						<a href="" target="_blank">điều khoản và dịch vụ</a>

				</form>
				<!-- Form -->

			</div>

		</div>
	
	</div>
	</div>
	
	<br></br>

@endsection
