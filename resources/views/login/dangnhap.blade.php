@extends('layouts.app')

@section('content')
<style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:w…0;600;700&family=Nunito:wght@300;400;600;700&display=swap');

.login-wrapper {
    min-height: 100vh;
    background: linear-gradient(135deg, #f5f0e8 0%, #fdf6ec 50%, #f0e8d8 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px 15px;
    font-family: 'Nunito', sans-serif;
}

.login-card {
    background: white;
    border-radius: 24px;
    box-shadow: 0 20px 60px rgba(0,104,139,0.12), 0 4px 20px rgba(0,0,0,0.06);
    overflow: hidden;
    width: 100%;
    max-width: 460px;
}

.login-header {
    background: linear-gradient(135deg, #00688B 0%, #005a78 100%);
    padding: 45px 40px 35px;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.login-header::before {
    content: '🎂';
    position: absolute;
    font-size: 90px;
    opacity: 0.08;
    right: -15px;
    top: -15px;
}

.login-header::after {
    content: '🍰';
    position: absolute;
    font-size: 70px;
    opacity: 0.08;
    left: -10px;
    bottom: -15px;
}

.login-header .logo-circle {
    width: 70px;
    height: 70px;
    background: rgba(255,255,255,0.15);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 15px;
    font-size: 30px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.2);
}

.login-header h3 {
    font-family: 'Playfair Display', serif;
    color: white;
    font-size: 28px;
    font-weight: 700;
    margin: 0;
    letter-spacing: 0.5px;
}

.login-header p {
    color: rgba(255,255,255,0.75);
    margin: 8px 0 0;
    font-size: 14px;
    font-weight: 300;
}

.login-body {
    padding: 40px 40px 35px;
}

.form-group-custom {
    margin-bottom: 20px;
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
    padding: 12px 15px;
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

.error-box {
    background: #fff5f5;
    border: 1px solid #ffd0d0;
    border-radius: 10px;
    padding: 12px 15px;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 8px;
    color: #e74c3c;
    font-size: 13.5px;
}

.btn-login {
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
    margin-top: 5px;
    text-transform: uppercase;
}

.btn-login:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,104,139,0.35);
}

.btn-login:active {
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
    width: 44%;
    height: 1px;
    background: #eee;
}

.divider::before { left: 0; }
.divider::after { right: 0; }

.register-link {
    text-align: center;
    font-size: 14px;
    color: #777;
}

.register-link a {
    color: #00688B;
    font-weight: 700;
    text-decoration: none;
}

.register-link a:hover {
    text-decoration: underline;
}

.forgot-link {
    text-align: right;
    margin-top: -10px;
    margin-bottom: 15px;
}

.forgot-link a {
    font-size: 12.5px;
    color: #00688B;
    text-decoration: none;
}

.forgot-link a:hover {
    text-decoration: underline;
}

@media (max-width: 480px) {
    .login-body { padding: 25px 20px 30px; }
    .login-header { padding: 30px 20px 25px; }
}
</style>

<div class="login-wrapper">
    <div class="login-card">
        <div class="login-header">
            <div class="logo-circle">🎂</div>
            <h3>Chào Mừng Trở Lại</h3>
            <p>Đăng nhập để tiếp tục mua sắm</p>
        </div>

        <div class="login-body">
            <form action="{{ url('/dangnhap/dienthongtin') }}" method="post">
                {{ csrf_field() }}
@if(session('thongbao'))
<div class="error-box">
    ⚠ {{ session('thongbao') }}
</div>
@endif
                @if(isset($kt))
                <div class="error-box">
                    ⚠ Tên tài khoản hoặc mật khẩu không đúng, vui lòng thử lại.
                </div>
                @endif

                <div class="form-group-custom">
                    <label><i class="fa fa-user"></i>Tên đăng nhập / Email / SĐT</label>
                    <input type="text" class="form-control" name="tendangnhap"
                        placeholder="Nhập tên đăng nhập, email hoặc SĐT" required>
                </div>

                <div class="form-group-custom">
                    <label><i class="fa fa-lock"></i>Mật Khẩu</label>
                    <input type="password" class="form-control" name="matkhau"
                        placeholder="••••••••" required>
                </div>

                <button type="submit" class="btn-login">
                    Đăng Nhập
                </button>

                <div class="divider">hoặc</div>

                <p class="register-link">
                    Chưa có tài khoản? <a href="{{ url('/dangky') }}">Đăng ký ngay</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection

	
