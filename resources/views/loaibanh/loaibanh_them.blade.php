@extends('layouts.app')

@section('content')
<br></br>
<div class="row"><div class="mt-1"></div></div>
<div class="row justify-content-md-center">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header text-light" style="background:#00688B"><h5>Danh sách loại bánh</h5></div>
				<div class="card-body mt-7">	
					<table id="myTable" class="table table-bordered table-hover table-light table-md table-responsive">
							<thead>
							<tr>
								<td width="5%">ID</td>
								<td width="80%">Tên Loại Bánh</td>
								<td width="5%">Sửa</td>
								<td width="5%">Xóa</td>
							</tr>
							</thead>
							<tbody>
							@php $count = 1; @endphp
							@foreach($loaibanh as $value)
								<tr>
									<td>{{ $count++ }}</td>
									<td>{{ $value->TenLoai }}</td>
									<td><a href="{{url('loaibanh/loaibanh_sua/'.$value->ID	)}}"><h4 class="icon-pencil"></h4></a></td>
									<td><a href="{{url('loaibanh/loaibanh_xoa/'.$value->ID	)}}"><h4 class="icon-remove text-danger"></h4></a></td>
								</tr>
							@endforeach
							</tbody>
						
					</table>
					<form action="{{ url('/loaibanh/loaibanh_them') }}" method="post">
					{{ csrf_field() }}
					<p class="row justify-content-md-center">	
						<button class="btn rounded-right"  role="button" type="submit" style="background:#00688B;color:white"><i class="icon-plus-sign"></i> Thêm loại bánh</button>
						<input type="text" class="form-control col-md-6 rounded-left ml-1" placeholder="Tên loại" name="tenloai" id="tenloai">
					</p>
					</form>
					
				</div>
			</div>
		</div>
	</div>
	
 <br></br>
@endsection
