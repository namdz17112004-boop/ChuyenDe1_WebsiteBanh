@foreach($banh as $value)
	<div class="col-md-4 justify-content-md-center mt-4">
	<div class="card ml-4" style="width: 21rem;">
		  <img class="card-img-top rounded" style="height:12rem" src="{{ asset('images/'.$value->HinhAnh) }}" alt="Card image cap">
		  <div class="card-body">
			<h5 class="card-title text-primary font-weight-bold text-center" style="text-transform: uppercase;">{{$value->TenBanh}}</h5>
			<p class="card-text text-danger font-weight-bold">Giá tiền: {{$value->GiaTien}} VNĐ</p>
			<p class="card-text text-info font-weight-bold">Loại bánh: {{$value->TenLoai}}</p>
			<p class="card-text text-success font-weight-bold">Số lượng: {{$value->SoLuong}} Cái</p>
			<p class="text-center">
			<a href="{{ url('/banh/xemchitietbanh/'.$value->ID) }}" class="btn btn-primary">Xem Chi Tiết</a>
			<a href="#" class="btn btn-warning">Đặt Hàng</a>
			</p>
		  </div>
		</div>
	</div>
	{{$banh->links()}}
@endforeach
