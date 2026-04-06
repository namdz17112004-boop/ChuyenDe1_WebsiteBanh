@extends('layouts.app')

@section('content')	
	<br></br>
<div class="row"><div class="mt-1"></div></div>
<div class="row">
	<div class="col-md-12">
	<div class="card">
		<div class="card-header text-light"style="background:#00688B"><h5>Hóa Đơn</h5></div>
		<div class="card-body justify-content-md-center">	
			<table id="myTable" class="table table-bordered table-hover table-light table-md table-responsive text-center">
							<thead>
							<tr>
								<td width="5%">ID</td>
								<td width="20%">Họ và Tên khách hàng</td>
								<td width="10%">SĐT</td>
								<td width="10%">Email</td>
								
								<td width="10%">Ngày Lập</td>
								<td width="25%">Địa chỉ</td>
								<td width="5%">Tổng Tiền</td>
								<td width="5%">Chi tiết</td>
							</tr>
							</thead>
							<tbody>
							@foreach($hoadon as $value)
								<tr>
									<td>{{ $value->ID }}</td>
									<td>{{ $value->TenKhachHang }}</td>
									<td>{{ $value->SDT }}</td>
									<td>{{ $value->Email }}</td>
									<td>{{ $value->NgayLap }}</td>
									<td>{{ $value->DiaChi }}</td>
									<td>{{ number_format($value->TongTien) }}</td>
									<td><a href="{{url('hoadon/xemchitiethoadon/'.$value->ID)}}"><h4 class="icon-hand-right"></h4></a></td>
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
