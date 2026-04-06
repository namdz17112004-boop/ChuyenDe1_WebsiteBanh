@extends('layouts.app')

@section('content')
	<script type="text/javascript">
		function capnhatsoluong(qty,rowId,id)
		{
			$.get(
			'{{asset('giohang/capnhatso')}}',{qty:qty,rowId:rowId,id},
			function()
			{
				location.reload();
			}
			);
		}			
	</script>
	@if(Session::has('kiemtra')) 
	<script type="text/javascript">
		alert('Số lượng bạn mua vượt quá số lượng trong kho');
	</script>
	@endif
	@if(Cart::getTotalQuantity()>0)	
	<br></br>		
	<h5>Giỏ hàng của bạn ({{Cart::getTotalQuantity()}} sản phẩm)<span style="float:right"><a href="{{ url('/') }}" style="color:#004f3d">Mua thêm sản phẩm khác</a></span></h5>
	<br></br>
	<div class="row justify-content-md-center">
	<div class="col-md-10 text-center">
	<form>
	<div class="card">
	
	<table border="">
	<thead>
	<tr class="text-center">
		<td width="40%"></td>
		<td width=""><h5 class="">Giá tiền</h5> </td>
		<td width=""><h5 class="text-primary">Số lượng</h5></td>
		<td width=""><h5 class="text-danger">Tổng tiền</h5></td>
		<td width=""></td>
	</tr>
	</thead>
	<tbody>
	@foreach($giohang as $value)
	<tr class="border-bottom text-center">
	
		<td class=""><div class="row">
		<img  class="border ml-4 mb-2 mt-2" src="{{ asset('images/'.$value->options->img) }}" style="height:100px; width:150px">
		<h5 class="font-weight-bold ml-4 mt-2" style="text-transform: uppercase;">{{$value->name}} </h5></div>
		</td>
		<td class="align-middle">{{number_format($value->price)}} VNĐ</td>
		 <td class="align-middle"><input type="number" value="{{$value->qty}}" style="width:70px" onchange="capnhatsoluong(this.value,'{{$value->rowId}}','{{$value->id}}')"> Cái</td>
		<td class="align-middle">{{number_format($value->qty*$value->price)}} VNĐ</td>
		<td class="align-middle"><a href="{{url('giohang/xoagiohang/'.$value->rowId)}}"><h4 class="icon-check-minus text-danger"></h4></a></td>
	 </tr>
	
	 @endforeach
	 <tr>
		<td colspan="3"><h5 class="mt-3 mb-3">Tổng tiền</h5></td>
		<td><h5>{{Cart::getTotal()}} VNĐ</h5></td>
	 </tr>
	 </tbody>
	 </table>
	</div>
		<button type="button" class="mt-2"  style="color:#004f3d">
		<a href="{{url('dathang/dienthongtin')}}">
				Đặt hàng
		</a>
		</button>
	</form>
	
	</div>
	
	</div>
	
	<div class="row mt-3 text-center">
	<div class="col-md-12">
		<button	 style="color:red; float:right" ><a href="{{ url('giohang/xoaallgiohang')}}">Xóa toàn bộ hàng</button>
	</div>
	</div>
	<br></br>
	@else
		<br></br>
		<div class="card text-center">
		  <div class="card-header ">
			<h1>Giỏ Hàng bạn trống</h1>
		  </div>
		  <div class="card-body">
			<h2 class="icon-shopping-cart text-danger"></h2>
			<a href="{{ url('/') }}" class="btn" style="color:#004f3d">Trở về trang chủ</a>
		  </div>
		</div>
		<br></br>
	@endif
	
@endsection
	
