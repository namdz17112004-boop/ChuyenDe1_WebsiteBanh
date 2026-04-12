@extends('layouts.app')

@section('content')

<script>
function capnhatsoluong(qty, id)
{
    $.get("{{ url('giohang/capnhatso') }}", {
        qty: qty,
        id: id
    }, function () {
        location.reload();
    });
}
</script>

@if(Session::has('kiemtra'))
<script>
alert('Số lượng vượt quá trong kho');
</script>
@endif

@if(Cart::getTotalQuantity() > 0)

<br>
<h5>
    Giỏ hàng của bạn ({{ Cart::getTotalQuantity() }} sản phẩm)
    <span style="float:right">
        <a href="{{ url('/') }}" style="color:#004f3d">Mua thêm</a>
    </span>
</h5>
<br>

<div class="row justify-content-md-center">
<div class="col-md-10 text-center">

<div class="card p-3">

<table class="table table-bordered">
<thead>
<tr class="text-center">
    <th width="40%"></th>
    <th>Giá tiền</th>
    <th class="text-primary">Số lượng</th>
    <th class="text-danger">Tổng tiền</th>
    <th></th>
</tr>
</thead>

<tbody>
@foreach($giohang as $value)
<tr class="text-center align-middle">

<td>
    <div class="d-flex align-items-center">
        <img src="{{ asset('images/'.$value->attributes->img) }}"
             style="height:80px;width:120px"
             class="border mr-3">

        <h6 class="font-weight-bold text-uppercase">
            {{ $value->name }}
        </h6>
    </div>
</td>

<td>{{ number_format($value->price) }} VNĐ</td>

<td>
    <input type="number"
           value="{{ $value->quantity }}"
           min="1"
           style="width:70px"
           onchange="capnhatsoluong(this.value, '{{ $value->id }}')">
</td>

<td>
    {{ number_format($value->price * $value->quantity) }} VNĐ
</td>

<td>
    <a href="{{ url('giohang/xoagiohang/'.$value->id) }}">
        ❌
    </a>
</td>

</tr>
@endforeach

<tr>
    <td colspan="3"><b>Tổng tiền</b></td>
    <td><b>{{ number_format(Cart::getTotal()) }} VNĐ</b></td>
</tr>

</tbody>
</table>

</div>

<!-- Nút đặt hàng -->
<a href="{{ url('dathang/dienthongtin') }}" class="btn btn-success mt-3">
    Đặt hàng
</a>

</div>
</div>

<!-- Xóa tất cả -->
<div class="text-right mt-3">
    <a href="{{ url('giohang/xoaallgiohang') }}" class="btn btn-danger">
        Xóa toàn bộ
    </a>
</div>

<br>

@else

<br>
<div class="card text-center p-4">
    <h3>Giỏ hàng trống</h3>
    <i class="fa fa-shopping-cart fa-3x text-danger"></i>
    <br><br>
    <a href="{{ url('/') }}" class="btn btn-primary">Về trang chủ</a>
</div>
<br>

@endif

@endsection
