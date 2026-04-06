@extends('layouts.app')

@section('content')
	<br></br>
	<div class="row justify-content-md-center">
	<div class="col-md-12 text-center">
	<div class="card">
	<div class="card-header">
	<h2>Hóa Đơn Số {{$hoadon->ID}} của khách hàng {{$hoadon->TenKhachHang}}</h2>
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
		<td><h5>{{number_format($hoadon->TongTien)}} VNĐ</h5></td>
	 </tr>
	 </tbody>
	 </table>
	 <div class="border-top">
		<button type="button" class="mt-2 mb-2"  style="color:#004f3d">
		<a href="{{ url('hoadon/xemhoadon') }}">
				Quay lại
		</a>
		</button>
		<button type="button" class="mt-2 mb-2"  style="color:#004f3d">
		<a href="{{ url('hoadon/inhoadon/'.$hoadon->ID) }}">
				In Hóa Đơn
		</a>
		</button>
	 </div>
	</div>
	
	</div>
	
	</div>
	<br></br>
@endsection
	
