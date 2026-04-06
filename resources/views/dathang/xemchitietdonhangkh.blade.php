@extends('layouts.app')

@section('content')
	<br></br>
	<div class="row justify-content-md-center">
	<div class="col-md-12 text-center">
	<div class="card">
	<div class="card-header">
	<h2>Đơn Hàng Số {{$donhang->ID}} của khách hàng {{$donhang->TenKhachHang}}</h2>
	</div>
	<table>
	<thead>
	<tr class="text-center">
		<td width="40%"></td>
		<td width=""><h5 class="">Đơn giá</h5> </td>
		<td width=""><h5 class="text-primary">Số lượng</h5></td>
		<td width=""><h5 class="text-danger">Tổng tiền</h5></td>
	</tr>
	</thead>
	<tbody>
	@foreach($chitiet as $value)
	<tr class="border-bottom text-center">
	
		<td class=""><div class="row">
		<img  class="border ml-4 mb-2 mt-2" src="{{ asset('images/'.$value->HinhAnh) }}" style="height:100px; width:150px">
		<h5 class="font-weight-bold ml-4 mt-2" style="text-transform: uppercase;">{{$value->TenBanh}} </h5></div>
		</td>
		<td class="align-middle">{{number_format($value->GiaTien)}} VNĐ</td>
		 <td class="align-middle">{{$value->SoLuong}} Cái</td>
		<td class="align-middle">{{number_format($value->GiaTien*$value->SoLuong)}} VNĐ</td>
	 </tr>
	
	 @endforeach
	 <tr>
		<td colspan="3"><h5 class="mt-3 mb-3">Tổng tiền</h5></td>
		<td><h5>{{number_format($donhang->TongTien)}} VNĐ</h5></td>
	 </tr>
	 </tbody>
	 </table> 
	 <br></br>
	 
	 @if($donhang->Duyet==0)
	 <div class="row justify-content-md-center col-12 ml-1"> 
			<h3 class="bg-dark mt-2 rounded-left" style="height:15px; width:50px"></h3>
			<h3 class="icon-circle-blank align-middle" style="margin-right:-3px;margin-left:-3px"></h3>
			<h3 class="bg-dark mt-2" style="height:15px; width:200px"></h3>
			<h3 class="icon-circle-blank align-middle" style="margin-right:-3px;margin-left:-3px"></h3>
			<h3 class="bg-dark mt-2" style="height:15px; width:200px"></h3>
			<h3 class="icon-circle-blank align-middle " style="margin-right:-3px;margin-left:-3px"></h3>
			<h3 class="bg-dark mt-2 rounded-right" style="height:15px; width:50px"></h3>
	 </div>
	  <div class="row justify-content-md-center col-12 ml-1"> 
			<h3 class="mt-2 rounded-left" style="width:50px"></h3>
			<p class="align-middle" style="margin-right:-3px;margin-left:-3px"> Đã Duyệt</p>
			<h3 class="mt-2" style="width:200px"></h3>
			<p class="align-middle" style="margin-left:10px">Đang vận chuyển</p>
			<h3 class="mt-2" style="height:15px; width:200px"></h3>
			<p class="align-middle" style="margin-right:-3px;margin-left:-3px">Hoàn thành</p>
			<p class="mt-2 rounded-right" style="width:50px"></p>
		</div>	
	 @elseif($donhang->Duyet==1)
	 <div class="row justify-content-md-center col-12 ml-1"> 
			<h3 class="bg-warning mt-2 rounded-left" style="height:15px; width:50px"></h3>
			<h3 class="icon-circle-blank align-middle text-warning" style="margin-right:-3px;margin-left:-3px"></h3>
			<h3 class="bg-dark mt-2" style="height:15px; width:200px"></h3>
			<h3 class="icon-circle-blank align-middle" style="margin-right:-3px;margin-left:-3px"></h3>
			<h3 class="bg-dark mt-2" style="height:15px; width:200px"></h3>
			<h3 class="icon-circle-blank align-middle " style="margin-right:-3px;margin-left:-3px"></h3>
			<h3 class="bg-dark mt-2 rounded-right" style="height:15px; width:50px"></h3>
	 </div>
	   <div class="row justify-content-md-center col-12 ml-1"> 
			<h3 class="mt-2 rounded-left" style="width:50px"></h3>
			<p class="align-middle" style="margin-right:-3px;margin-left:-3px"> Đã Duyệt <i class="icon-ok text-success"></i></p>
			<h3 class="mt-2" style="width:200px"></h3>
			<p class="align-middle" style="margin-left:10px">Đang vận chuyển</p>
			<h3 class="mt-2" style="height:15px; width:200px"></h3>
			<p class="align-middle" style="margin-right:-3px;margin-left:-3px">Hoàn thành</p>
			<p class="mt-2 rounded-right" style="width:50px"></p>
		</div>	
	  @elseif($donhang->Duyet==2)
	 <div class="row justify-content-md-center col-12 ml-1"> 
			<h3 class="bg-warning mt-2 rounded-left" style="height:15px; width:50px"></h3>
			<h3 class="icon-circle-blank align-middle text-warning" style="margin-right:-3px;margin-left:-3px"></h3>
			<h3 class="bg-warning mt-2" style="height:15px; width:200px"></h3>
			<h3 class="icon-circle-blank align-middle text-warning" style="margin-right:-3px;margin-left:-3px"></h3>
			<h3 class="bg-dark mt-2" style="height:15px; width:200px"></h3>
			<h3 class="icon-circle-blank align-middle " style="margin-right:-3px;margin-left:-3px"></h3>
			<h3 class="bg-dark mt-2 rounded-right" style="height:15px; width:50px"></h3>
	 </div>
	 <div class="row justify-content-md-center col-12 ml-1"> 
			<h3 class="mt-2 rounded-left" style="width:50px"></h3>
			<p class="align-middle" style="margin-right:-3px;margin-left:-3px"> Đã Duyệt <i class="icon-ok text-success"></i></p>
			<h3 class="mt-2" style="width:200px"></h3>
			<p class="align-middle" style="margin-left:10px">Đang vận chuyển <i class="icon-ok text-success"></i></p>
			<h3 class="mt-2" style="height:15px; width:200px"></h3>
			<p class="align-middle" style="margin-right:-3px;margin-left:-3px">Hoàn thành</p>
			<p class="mt-2 rounded-right" style="width:50px"></p>
		</div>	
	  @else
	 <div class="row justify-content-md-center col-12 ml-1"> 
			<h3 class="bg-warning mt-2 rounded-left" style="height:15px; width:50px"></h3>
			<h3 class="icon-circle-blank align-middle text-warning" style="margin-right:-3px;margin-left:-3px"></h3>
			<h3 class="bg-warning mt-2" style="height:15px; width:200px"></h3>
			<h3 class="icon-circle-blank align-middle text-warning" style="margin-right:-3px;margin-left:-3px"></h3>
			<h3 class="bg-warning mt-2" style="height:15px; width:200px"></h3>
			<h3 class="icon-circle-blank align-middle text-warning" style="margin-right:-3px;margin-left:-3px"></h3>
			<h3 class="bg-warning mt-2 rounded-right" style="height:15px; width:50px"></h3>
	 </div>
	 <div class="row justify-content-md-center col-12 ml-1"> 
			<h3 class="mt-2 rounded-left" style="width:50px"></h3>
			<p class="align-middle" style="margin-right:-3px;margin-left:-3px"> Đã Duyệt <i class="icon-ok text-success"></i></p>
			<h3 class="mt-2" style="width:200px"></h3>
			<p class="align-middle" style="margin-left:10px">Đang vận chuyển <i class="icon-ok text-success"></i></p>
			<h3 class="mt-2" style="height:15px; width:200px"></h3>
			<p class="align-middle" style="margin-right:-3px;margin-left:-3px">Hoàn thành <i class="icon-ok text-success"></i></p>
			<p class="mt-2 rounded-right" style="width:50px"></p>
		</div>	
	 @endif
	 	
	 <br></br>
	 <div class="border-top">
		<button type="button" class="mt-2 mb-2"  style="color:#004f3d">
		<a href="{{ url('xemdonhangkhachhang') }}">
				Quay lại
		</a>
		</button>
	 </div>
	 
	</div>
	
	</div>
	
	</div>
	<br></br>
@endsection
	
