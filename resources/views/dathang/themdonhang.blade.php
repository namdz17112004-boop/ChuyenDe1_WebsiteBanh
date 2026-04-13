@extends('layouts.app')

@section('content')
<style>
	.payment-box {
    border: 2px solid #ddd;
    border-radius: 10px;
    padding: 15px;
    cursor: pointer;
    transition: 0.3s;
    background: #f9f9f9;
}

.payment-box:hover {
    border-color: #35a0d5;
}

.payment-box.active {
    border-color: #52a0cd;
    background: #eaffea;
}
</style>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header text-light" style="background:#004f3d">
                <h5>🧾 Thông Tin Khách Hàng</h5>
            </div>

            <div class="card-body">

                <form action="{{ url('dathang/themdonhang') }}" method="post">
                    {{ csrf_field() }}

                    <!-- Họ tên -->
                    <div class="form-group">
                        <label>Họ và tên</label>
                        <input type="text" class="form-control"
                            name="hoten"
                            value="@if(isset($thongtin)){{$thongtin->HoTen}}@endif"
                            required>
                    </div>

                    <!-- SĐT -->
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input type="text" class="form-control"
                            name="sdt"
                            value="@if(isset($thongtin)){{$thongtin->SDT}}@endif"
                            required>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control"
                            name="email"
                            value="@if(isset($thongtin)){{$thongtin->Email}}@endif">
                    </div>

                    <!-- Địa chỉ -->
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <textarea class="form-control"
                            name="diachi"
                            required>@if(isset($thongtin)){{$thongtin->DiaChi}}@endif</textarea>
                    </div>

                    <!-- 🔥 Thanh toán -->
                   <div class="form-group mt-3">
    <label><b>Phương thức thanh toán</b></label>

    <div class="row">
        <!-- COD -->
        <div class="col-md-6">
            <div class="payment-box active" onclick="selectPayment('cod')">
                <input type="radio" name="thanhtoan" value="cod" checked hidden>
                <h6>💵 Thanh toán khi nhận hàng</h6>
                <p>Nhận hàng rồi trả tiền</p>
            </div>
        </div>

        <!-- BANK -->
        <div class="col-md-6">
            <div class="payment-box" onclick="selectPayment('bank')">
                <input type="radio" name="thanhtoan" value="bank" hidden>
<h6>🏦 Chuyển khoản ngân hàng</h6>
                <p>Thanh toán trước qua tài khoản</p>
            </div>
        </div>
    </div>
</div>

<!-- 🔥 THÔNG TIN NGÂN HÀNG -->
<div id="bankInfo" class="alert alert-info mt-3" style="display:none;">
    <h6>🏦 Thông tin chuyển khoản</h6>
    <p><b>Ngân hàng:</b> Vietcombank</p>
    <p><b>STK:</b> 123456789</p>
    <p><b>Chủ TK:</b> DO HOANG NAM</p>
    <p><b>Nội dung:</b> Thanh toán đơn hàng</p>
</div>

                    <!-- Button -->
                    <div class="text-center mt-3">
                        <button class="btn btn-success px-4">
                            🛒 Đặt Hàng
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- 🔥 JS -->
<script>
document.querySelectorAll('input[name="thanhtoan"]').forEach(el => {
    el.addEventListener('change', function () {
        document.getElementById('bankInfo').style.display =
            this.value === 'bank' ? 'block' : 'none';
    });
});
</script>
<script>
function selectPayment(type) {
    // bỏ active
    document.querySelectorAll('.payment-box').forEach(el => {
        el.classList.remove('active');
    });

    // set active
    if (type === 'cod') {
        document.querySelectorAll('.payment-box')[0].classList.add('active');
        document.querySelector('input[value="cod"]').checked = true;
        document.getElementById('bankInfo').style.display = 'none';
    } else {
        document.querySelectorAll('.payment-box')[1].classList.add('active');
        document.querySelector('input[value="bank"]').checked = true;
        document.getElementById('bankInfo').style.display = 'block';
    }
}
</script>

@endsection
