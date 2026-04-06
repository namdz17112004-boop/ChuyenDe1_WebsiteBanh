@extends('layouts.app')

@section('content')
<br></br>
<div class="row"><div class="mt-1"></div></div>
<div class="row">
	<div class="col-md-12">
	<div class="card text-center">
		<div class="card-header text-light"style="background:#00688B;height:50px"><h4>Thêm Bánh Mới</h4></div>
		<div class="card-body justify-content-md-center">	
			<form action="{{ url('/banh/banh_themvao') }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group row">
			<div class="col-sm-8">
				<div class="row">
					<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-lg">Loại Bánh:</label>
					<div class="col-sm-4">
					<select class="browser-default custom-select rounded-0" name="maloai" id="maloai">
						 @foreach($loaibanh as $value)
						
						  <option value="{{$value->ID}}">{{$value->TenLoai}}</option>
						 @endforeach
					</select>
					</div>
					 <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Tên Bánh:</label>
					<div class="col-sm-4">
					  <input class="form-control rounded-0" id="tenbanh" name="tenbanh" placeholder="Điền Tên Bánh">
					</div>
				</div>	
				<div class="row mt-2">
					<label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg ">Số Lượng:</label>
					<div class="col-sm-4 ml-2">
					  <input class="form-control rounded-0" id="soluong" name="soluong" placeholder="Điền Số Lượng" type="number">
					</div>
					<label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Gía Tiền:</label>
					<div class="col-sm-3 ml-4">
					  <input class="form-control rounded-0" id="giatien" name="giatien" placeholder="Giá tiền" type="number">
					</div>
				</div>	
			</div>
			<div class="col-sm-4">
					<div class="row">
					  <div class="input-group-prepend col-2">
						<span class="input-group-text rounded-0">Chọn hình</span>
					  </div>
					  <div class="col-8 custom-file ml-5">
						<input type="file" class="custom-file-input" id="hinhbanh" name="hinhbanh" required="true" >
						 <label class="custom-file-label rounded-0" for="inputGroupFile01"></label>
					  </div>
					</div>
					<div class="row mt-3">
						<div class="input-group-prepend">
							<label for="colFormLabelLg" class="mr-4 ml-3 col-form-label col-form-label-lg">Ngày SX:</label>
						</div>
						<input class="col-md-8 form-control" type="date" id="ngaysx" name="ngaysx" width="276" class="from-control border"/> 
					</div>
			</div>
			</div>
			<hr>
			<div class="form-group row justify-content-md-center">
			<div class="row"><h3>Nội Dung</h3></div>
			</div>
			<div class="row">
				<div class="col-md-12">
				<textarea class="form-control" aria-label="With textarea" id="editor1" name="noidung"></textarea>
				</div>				
			</div>
			</div>
			<p class="row justify-content-md-center">
				<button class="btn"  role="button" type="submit" style="background:#00688B;color:white"><i class="icon-plus-sign"></i> Thêm bánh</button>
				
			</p>
			</form>
		</div>
	</div>
	</div>
</div>

	


@endsection
