@extends('layouts.app')

@section('content')	
<br></br>
<div class="row"><div class="mt-1"></div></div>
<div class="row">
	<div class="col-md-12">
	<div class="card">
		<div class="card-header text-light"style="background:#00688B"><h5>Đơn đặt hàng</h5></div>
		<div class="card-body justify-content-md-center">	
			<table id="myTable" class="table table-bordered table-hover table-light table-md table-responsive text-center">
							<thead>
							<tr>
								<td width="5%">ID</td>
								<td width="20%">Họ và Tên khách hàng</td>
								<td width="10%">SĐT</td>
								<td width="10%">Email</td>
								
								<td width="10%">Ngày Mua</td>
								<td width="25%">Địa chỉ</td>
								<td width="5%">Tổng Tiền</td>
                                <td width="10%">Thanh toán</td>
								<td width="5%">Duyệt</td>
								<td width="5%">Xóa</td>
								<td width="5%">Chi tiết</td>
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
                                    @if($value->ThanhToan == 'cod')
                                        <span class="badge bg-success">💵 COD</span>
                                    @else
                                        <span class="badge bg-primary">🏦 Chuyển khoản</span>
                                    @endif
                                    </td>
									<td>
										@if($value->Duyet==0)
										
											<a href="{{url('dathang/duyetdonhang/'.$value->ID)}}" title="chưa duyệt"><h4 class="icon-ban-circle text-danger"></h4></a>
										
										@elseif($value->Duyet==1)
											<a href="{{url('dathang/duyetdonhang/'.$value->ID)}} " title="đã duyệt"><h4 class="icon-ok-sign text-warning"></h4></a>
										@elseif($value->Duyet==2)
											<a href="{{url('dathang/duyetdonhang/'.$value->ID)}}" title="Đang vận chuyển"><h4 class="icon-truck text-info"></h4></a>
										@else
											<h4 class="icon-foursquare text-success" title="Đã hoàn thành"></h4>
										@endif
									</td>
									<td><a href="{{url('dathang/xoadonhang/'.$value->ID)}}"><h4 class="icon-remove text-danger"></h4></a></td>
									<td><a href="{{url('dathang/xemchitietdonhang/'.$value->ID)}}"><h4 class="icon-hand-right"></h4></a></td>
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
