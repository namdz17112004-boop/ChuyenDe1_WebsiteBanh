@extends('layouts.app')

@section('content')
<br></br>
<div class="row"><div class="mt-1"></div></div>
<div class="row">
	<div class="col-md-12">
	<div class="card text-center">
		<div class="card-header text-light"style="background:#00688B;height:50px"><h4>Sửa {{$banh->TenBanh}}</h4></div>
		<div class="card-body justify-content-md-center">	
			<form action="{{ url('/banh/banh_sua') }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<input type="hidden" value="{{$banh->ID}}" name="id" id="id"  />
			<div class="form-group row">
			<div class="col-sm-8">
				<div class="row">
					<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-lg">Loại Bánh:</label>
					<div class="col-sm-4">
					<select class="browser-default custom-select form-control" name="maloai" id="maloai">
						 @foreach($loaibanh as $value)
						  <option @if($banh->MaLoai==$value->ID)selected="selected" @endif
						  value="{{$value->ID}}">{{$value->TenLoai}}</option>
						 @endforeach
					</select>
					</div>
					 <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Tên Bánh:</label>
					<div class="col-sm-4">
					  <input class="form-control" id="tenbanh" name="tenbanh" placeholder="Điền Tên Bánh" value="{{$banh->TenBanh}}" required="true">
					</div>
				</div>	
				<div class="row mt-2">
					<label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Số Lượng:</label>
					<div class="col-sm-4 ml-2">
					  <input class="form-control" id="soluong" name="soluong" placeholder="Điền Số Lượng" type="number" value="{{$banh->SoLuong}}"required="true">
					</div>
					<label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Gía Tiền:</label>
					<div class="col-sm-3 ml-4">
					  <input class="form-control" id="giatien" name="giatien" placeholder="Giá tiền" type="number" value="{{$banh->GiaTien}}" required="true">
					</div>
				</div>	
			</div>
			<div class="col-sm-4">
					<div class="row">
					  <div class="input-group-prepend">
						<div class="input-group-text rounded-0" onclick="BrowseServer();">Tải Hình</div>
					  </div>
					  <div class="custom-file col-9">
						<input type="text" id="hinhbanh" name="hinhbanh" required="true" lang="vi" value="{{$banh->HinhAnh}}">
					  </div>
					</div>
					<div class="row mt-3">
						<div class="input-group-prepend">
							<label for="colFormLabelLg" class="mr-4 col-form-label col-form-label-lg">Ngày SX:</label>
						</div>
						<input class="col-md-8 form-control" type="date" id="ngaysx" name="ngaysx" width="276" class="from-control border" value="{{$banh->NgaySX}}"/> 
					</div>
			</div>
			</div>
			<hr>
			<div class="form-group row justify-content-md-center">
			<div class="row"><h4>Nội Dung</h4></div>
			</div>
			<div class="row">
				<div class="col-md-12">
				<textarea class="form-control" aria-label="With textarea" id="editor1" name="noidung"  >{{$banh->NoiDung}}</textarea>
				</div>				
			</div>
			</div>
			<p class="row justify-content-md-center">
				<button class="btn"  role="button" type="submit" style="background:#00688B;color:white"><i class="icon-pencil"></i> Sửa bánh</button>
			</p>
			</form>
		</div>
	</div>
	</div>
</div>


@endsection
