@extends('layouts.app')

@section('content')
<style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:w…t@400;600;700&family=Nunito:wght@300;400;600&display=swap');

.register-wrapper {
    min-height: 100vh;
    background: linear-gradient(135deg, #f5f0e8 0%, #fdf6ec 50%, #f0e8d8 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px 15px;
    font-family: 'Nunito', sans-serif;
}

.register-card {
    background: white;
    border-radius: 24px;
    box-shadow: 0 20px 60px rgba(0,104,139,0.12), 0 4px 20px rgba(0,0,0,0.06);
    overflow: hidden;
    width: 100%;
    max-width: 580px;
}

.register-header {
    background: linear-gradient(135deg, #00688B 0%, #005a78 100%);
    padding: 40px 40px 30px;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.register-header::before {
    content: '🎂';
    position: absolute;
    font-size: 80px;
    opacity: 0.08;
    right: -10px;
    top: -10px;
}

.register-header::after {
    content: '🍰';
    position: absolute;
    font-size: 60px;
    opacity: 0.08;
    left: -5px;
    bottom: -10px;
}

.register-header h3 {
    font-family: 'Playfair Display', serif;
    color: white;
    font-size: 28px;
    font-weight: 700;
    margin: 0;
    letter-spacing: 0.5px;
}

.register-header p {
    color: rgba(255,255,255,0.75);
    margin: 8px 0 0;
    font-size: 14px;
    font-weight: 300;
}

.register-body {
    padding: 35px 40px 40px;
}

.form-group-custom {
    margin-bottom: 20px;
    position: relative;
}

.form-group-custom label {
    display: block;
    font-size: 13px;
    font-weight: 600;
    color: #555;
    margin-bottom: 7px;
    letter-spacing: 0.3px;
}

.form-group-custom label i {
    color: #00688B;
    margin-right: 6px;
    width: 14px;
}

.form-group-custom .form-control {
    border: 1.5px solid #e8e8e8;
    border-radius: 10px;
    padding: 11px 15px;
    font-size: 14px;
    font-family: 'Nunito', sans-serif;
    color: #333;
    transition: all 0.2s;
    background: #fafafa;
    width: 100%;
}

.form-group-custom .form-control:focus {
    border-color: #00688B;
    box-shadow: 0 0 0 3px rgba(0,104,139,0.1);
    background: white;
    outline: none;
}

.form-row-custom {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
}

.error-text {
    color: #e74c3c;
    font-size: 12px;
    margin-top: 5px;
    display: flex;
    align-items: center;
    gap: 4px;
}

.btn-register {
    width: 100%;
    padding: 14px;
    background: linear-gradient(135deg, #00688B 0%, #005a78 100%);
    color: white;
    border: none;
    border-radius: 12px;
    font-family: 'Nunito', sans-serif;
    font-size: 15px;
    font-weight: 700;
    letter-spacing: 1px;
    cursor: pointer;
    transition: all 0.3s;
    margin-top: 10px;
    text-transform: uppercase;
}

.btn-register:hover {
    transform: translateY(-2px);
box-shadow: 0 8px 25px rgba(0,104,139,0.35);
}

.btn-register:active {
    transform: translateY(0);
}

.divider {
    text-align: center;
    margin: 20px 0;
    position: relative;
    color: #aaa;
    font-size: 13px;
}

.divider::before, .divider::after {
    content: '';
    position: absolute;
    top: 50%;
    width: 42%;
    height: 1px;
    background: #eee;
}

.divider::before { left: 0; }
.divider::after { right: 0; }

.terms-text {
    text-align: center;
    font-size: 12.5px;
    color: #999;
    margin-top: 15px;
    line-height: 1.6;
}

.terms-text a {
    color: #00688B;
    text-decoration: none;
    font-weight: 600;
}

.terms-text a:hover {
    text-decoration: underline;
}

.login-link {
    text-align: center;
    margin-top: 20px;
    font-size: 14px;
    color: #777;
}

.login-link a {
    color: #00688B;
    font-weight: 700;
    text-decoration: none;
}

.login-link a:hover {
    text-decoration: underline;
}

@media (max-width: 480px) {
    .register-body { padding: 25px 20px 30px; }
    .register-header { padding: 30px 20px 25px; }
    .form-row-custom { grid-template-columns: 1fr; }
}
</style>

<div class="register-wrapper">
    <div class="register-card">
        <div class="register-header">
            <h3>Tạo Tài Khoản</h3>
            <p>Tham gia EAUTCAKE để nhận ưu đãi đặc biệt 🎁</p>
        </div>

        <div class="register-body">
            <form action="{{ url('/dangky/dienthongtin') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-row-custom">
                    <div class="form-group-custom">
                        <label><i class="fa fa-user"></i>Họ và Tên</label>
                        <input type="text" class="form-control" name="hoten" placeholder="Nguyễn Văn A" required>
                    </div>
                    <div class="form-group-custom">
                        <label><i class="fa fa-id-card"></i>Tên Đăng Nhập</label>
                        <input type="text" class="form-control" name="tendangnhap" placeholder="username" required>
                        @if(isset($dn))
                            <div class="error-text">⚠ Tên đăng nhập đã tồn tại</div>
                        @endif
                    </div>
                </div>

                <div class="form-group-custom">
                    <label><i class="fa fa-envelope"></i>Địa Chỉ Email</label>
                    <input type="email" class="form-control" name="email" placeholder="example@email.com" required>
                    @if(isset($gm))
                        <div class="error-text">⚠ Email này đã được sử dụng</div>
                    @endif
                </div>

                <div class="form-row-custom">
                    <div class="form-group-custom">
<label><i class="fa fa-lock"></i>Mật Khẩu</label>
                        <input type="password" class="form-control" name="matkhau" placeholder="••••••••" required>
                    </div>
                    <div class="form-group-custom">
                        <label><i class="fa fa-lock"></i>Xác Nhận Mật Khẩu</label>
                        <input type="password" class="form-control" name="nhaplaimatkhau" placeholder="••••••••" required>
                        @if(isset($mk))
                            <div class="error-text">⚠ Mật khẩu không khớp</div>
                        @endif
                    </div>
                </div>

                <div class="form-group-custom">
                    <label><i class="fa fa-phone"></i>Số Điện Thoại</label>
                    <input type="number" class="form-control" name="sdt" placeholder="0xxxxxxxxx" required>
                    @if(isset($sdt))
                        <div class="error-text">⚠ Số điện thoại đã tồn tại</div>
                    @endif
                </div>

                <button type="submit" class="btn-register">
                    Đăng Ký Ngay
                </button>

                <p class="terms-text">
                    Bằng cách nhấp "Đăng Ký" bạn đồng ý với
                    <a href="#">điều khoản và dịch vụ</a> của chúng tôi
                </p>

                <div class="divider">hoặc</div>

                <p class="login-link">
                    Đã có tài khoản? <a href="{{ url('/dangnhap') }}">Đăng nhập ngay</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection
