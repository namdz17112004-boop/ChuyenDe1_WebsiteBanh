@extends('layouts.app')

@section('content')
	<br></br>		
	
	<br></br>
	<div class="row justify-content-md-center">
	<div class="col-md-10 text-center">
	
	<div class="card">
	<br></br>
	 <h1 class="font-weight-bold" style="color:#FF3333">Đơn đặt hàng</h1>
	 <br></br>
		 <div class="row justify-content-md-center">
				<div class="card-body justify-content-md-center">	
			<table  class="table table-bordered table-hover table-light table-md table-responsive text-center">
							<thead>
							<tr>
								<td width="5%">ID</td>
								<td width="20%">Họ và Tên khách hàng</td>
								<td width="10%">SĐT</td>
								<td width="10%">Email</td>
								
								<td width="10%">Ngày Mua</td>
								<td width="25%">Địa chỉ</td>
								<td width="5%">Tổng Tiền</td>
								<td width="5%">Trạng Thái</td>
								<td width="5%">Chi tiết</td>
								<td width="5%">Hủy</td>
							</tr>
							</thead>
							<tbody>
							@foreach($donhang as $value)
								<tr>
									<td>{{ $value->ID }}</td>
									<td>{{ $value->TenKhachHang }}</td>
									<td>{{ $value->SDT }}</td>
									<td>{{ $value->Email }}</td>
									<td>{{ $value->NgayMua }}</td>
									<td>{{ $value->DiaChi }}</td>
									<td>{{ number_format($value->TongTien) }}</td>
									
									<td>
										@if($value->Duyet==0)
										
											<h4 title="chưa duyệt" class="icon-ban-circle text-danger"></h4>
										
										@elseif($value->Duyet==1)
											<h4 title="đã duyệt" class="icon-ok-sign text-warning"></h4>
										@elseif($value->Duyet==2)
											<h4  title="Đang vận chuyển" class="icon-truck text-info"></h4></a>
										@else
											<h4 class="icon-foursquare text-success" title="Đã hoàn thành"></h4>
										@endif
									</td>
									<td><a href="{{url('xemchitietdonhangkh/'.$value->ID)}}"><h4 class="icon-hand-right"></h4></a></td>
									<td><a href="{{url('dathang/xoadonhang/'.$value->ID)}}"><h4 class="icon-trash text-danger"></h4></a></td>
								</tr>
							@endforeach
				</tbody>
						
			</table>
		</div>
		 </div>
		
	<a href="{{ url('/') }}" style="color:#00688B"><button class="rounded-0">Về trang chủ</button></a>
	
	<br></br>
	</div>
	
	</div>
	</div>
	<br></br>

@endsection
	
