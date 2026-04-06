@extends('layouts.app')

@section('content')	
@if(session('id'))
<script>
	alert('Đã thay đổi mật khẩu cho tài khoản {{session('id')}} là 123456');
</script>
@endif

<br></br>
<div class="row"><div class="mt-1"></div></div>
<div class="row">
	<div class="col-md-12">
	<div class="card">
		<div class="card-header text-light"style="background:#004f3d"><h5>Thông tin tài khoản</h5></div>
		<div class="card-body justify-content-md-center">	
			<table id="myTable" class="table table-bordered table-hover table-light table-md table-responsive text-center">
							<thead>
							<tr>
								<td width="5%">STT</td>
								<td width="10%">Tài khoản</td>
								<td width="20%">Họ và Tên</td>
								<td width="10%">SĐT</td>
								<td width="10%">Email</td>
								<td width="25%">Địa chỉ</td>
								<td width="5%">Quyền</td>
								<td width="10%">Cấp lại mật khẩu</td>
								<td width="5%">Xóa</td>
							</tr>
							</thead>
							<tbody>
							@php $count=1; @endphp
							@foreach($taikhoan as $value)
								<tr>
									<td>{{$count++}}</td>
									<td>{{ $value->TaiKhoan }}</td>
									<td>{{ $value->HoTen }}</td>
									<td>{{ $value->SDT }}</td>
									<td>{{ $value->Email }}</td>
									<td>{{ $value->DiaChi }}</td>
									@if($value->QuyenHan==0)
										<td><a href="{{url('Setquyen/'.$value->TaiKhoan)}}"><span class="badge badge-primary">Khách hàng</span></a></td>
									@else
										<td><a href="{{url('Giamquyen/'.$value->TaiKhoan)}}"><span class="badge badge-success">Nhân viên</span></a></td>
									@endif
									<td><a href="{{url('capmatkhau/'.$value->TaiKhoan)}}"><h4 class="icon-key"></h4></a></td>
									<td><a href="{{url('xoataikhoan/'.$value->TaiKhoan)}}"><h4 class="icon-trash text-danger"></h4></a></td>
								</tr>
							@endforeach
				</tbody>
						
			</table>
		</div>
	</div>
	</div>
</div>
<br></br>

@endsection
