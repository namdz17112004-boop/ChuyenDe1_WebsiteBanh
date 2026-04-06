@extends('layouts.app')

@section('content')	
<script type="text/javascript">
		function capnhatkhuyenmai(id,khuyenmai)
		{
			$.get(
			'{{asset('capnhatkhuyenmai')}}',{id:id,khuyenmai:khuyenmai},
			function()
			{
				location.reload();
			}
			);
		}			
</script>
<br></br>
<div class="row"><div class="mt-1"></div></div>
<div class="row">
	<div class="col-md-12">
	<div class="card">
		<div class="card-header text-light text-center"style="background:#00688B"><h5>Danh Sách Bánh</h5></div>
		<div class="card-body justify-content-md-center">	
			<table id="myTable" class="table table-bordered table-hover table-light table-md table-responsive text-center">
							<thead>
							<tr>
								<td width="5%">ID</td>
								<td width="15%">Tên Bánh</td>
								<td width="10%">Tên Loại</td>
								<td width="10%">Giá Tiền</td>
								<td width="5%">Số Lượng</td>
								<td width="30%">Hình Ảnh</td>
								<td width="10%">Ngày sản xuất</td>
								<td width="5%">Khuyến Mãi</td>
								<td width="5%">Sửa</td>
								<td width="5%">Xóa</td>
							</tr>
							</thead>
							<tbody>
							@php $count = 1; @endphp
							@foreach($banh as $value)
								<tr>
									<td>{{ $count++ }}</td>
									<td>{{ $value->TenBanh }}</td>
									<td>{{ $value->TenLoai }}</td>
									<td>{{ $value->GiaTien }}</td>
									<td>{{ $value->SoLuong }}</td>
									<td style="height:150px">
										<img src="{{ asset('images/'.$value->HinhAnh) }}" width="200px"></img>
									</td>
									<td>{{ $value->NgaySX }}</td>
									<td>
										<select class="browser-default custom-select rounded-0" name="khuyenmai" id="khuyenmai" onchange="capnhatkhuyenmai('{{$value->ID}}',this.value)">
											 @php $n=0; @endphp
											 @for($i=0;$i<=10;$i++)
												<option @if($value->KhuyenMai==$n)selected="selected"@endif
												value="{{$n}}">{{$n}}%</option>		
											 @php $n=$n+5 @endphp
											 @endfor
										</select>
									</td>
									<td><a href="{{url('banh/banh_sua/'.$value->ID)}}"><h4 class="icon-pencil"></h4></a></td>
									<td><a href="{{url('banh/banh_xoa/'.$value->ID)}}"><h4 class="icon-remove text-danger"></h4></a></td>
								</tr>
			@endforeach
				</tbody>
						
			</table>
			
			<p class="row justify-content-md-center">
						<a href="{{ url('/banh/banh_them') }}"><button class="btn"  role="button" type="submit" style="background:#00688B;color:white"><i class="icon-plus-sign"></i> Thêm bánh</button></a>
							 <a href="{{ url('/banh/xuatbanh') }}"><button class="btn ml-3"  role="button" type="submit" style="background:#504f3d;color:white"><i class="icon-cloud-download"></i> Xuất file excel</button></a>
						<a><button class="btn ml-3 btn-primary"  role="button" type="submit" data-toggle="modal" data-target="#exampleModal"><i class="icon-cloud-upload"></i> Nhập file excel</button></a>
						<form action="{{ url('/banh/nhapbanh') }}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
							<div class="modal-content">
							  <div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Chọn file excel vào</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								  <span aria-hidden="true">&times;</span>
								</button>
							  </div>
							  <div class="modal-body">
								<input type="file" name="excel">
							  </div>
							  <div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
								<button type="submit" class="btn btn-primary">Chọn</button>
							  </div>
							</div>
						  </div>
						</div>
						</form
			</p>

			
		</div>
	</div>
	</div>
</div>
@endsection
