@extends('layouts.app')

@section('content')
<br></br>
<div class="row"><div class="mt-1"></div></div>
<div class="row justify-content-md-center">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header text-light" style="background:#00688B"><h5>Sửa loại bánh: {{$loaibanh->TenLoai}}</h5></div>
					<form action="{{ url('/loaibanh/loaibanh_sua') }}" method="post">
					{{ csrf_field() }}
					<input type="hidden" name="id" value="{{ $loaibanh->ID}}" />
					<p class="row justify-content-md-center mt-4">
						<button class="btn rounded-right"  role="button" type="submit" style="background:#00688B;color:white"><i class="icon-pencil"></i> Sửa loại bánh</button>
						<input type="text" class="form-control col-md-6 rounded-0 ml-1" placeholder="Tên loại" name="tenloai" id="tenloai">
					</p>
					</form>
					<p class="row justify-content-md-center"><a href="{{ url('/loaibanh/loaibanh_danhsach') }}"><button class="btn ml-1"  role="button" style="background:#00688B;color:white"><i class="icon-reply"></i> Quay lại</button></a><p>
					
				</div>
			</div>
		</div>
<br></br>
@endsection
