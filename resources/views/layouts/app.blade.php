<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Cửa Hàng Bánh</title>

	<link href="{{ asset('css/app.css') }}" type="text/css" rel="stylesheet" />
	<style>
/* Fix body padding */
body {
    padding-top: 60px !important;
    overflow-x: hidden;
}

/* Fix sidebar width */
.side-nav {
    width: 240px;
}

/* Khi đã login - đẩy nội dung sang phải */
body.fixed-sn .double-nav,
body.fixed-sn header,
body.fixed-sn footer {
    padding-left: 240px;
}

/* Nội dung chính */
body.fixed-sn > header ~ * {
    padding-left: 240px;
}

/* Responsive - màn hình nhỏ ẩn sidebar */
@media (max-width: 1440px) {
    body.fixed-sn .double-nav,
    body.fixed-sn header,
    body.fixed-sn footer,
    body.fixed-sn > header ~ * {
        padding-left: 0 !important;
    }
    .side-nav {
        transform: translateX(-105%);
    }
}

/* Fix carousel arrows */
.carousel-control-prev,
.carousel-control-next {
    width: 40px;
    opacity: 1;
    z-index: 10;
}
.carousel-control-prev h2,
.carousel-control-next h2 {
    font-size: 1.2rem;
    background: rgba(0,104,139,0.6);
    border-radius: 50%;
    padding: 8px 12px;
    color: white;
}

/* Fix images responsive */
.promo-box img {
    width: 100% !important;
    height: 170px !important;
    object-fit: cover;
}
.card-img-top {
    object-fit: cover;
    width: 100% !important;
}

/* Fix pagination center */
.pagination {
    justify-content: center !important;
    flex-wrap: wrap;
    margin-top: 15px;
}

/* Fix navbar */
nav.navbar.double-nav {
    z-index: 1000;
    background: white !important;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
}

/* Fix footer */
footer {
    margin-left: 0 !important;
}
</style>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,700,500italic,100italic,100' rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="{{ asset('css/stylesheet') }}" href="css/flexslider.css" type="text/css" media="screen" />
    <link href="{{ asset('css/sequence-looptheme.css') }}" rel="stylesheet" media="all" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/dataTables.bootstrap4.min.css') }}"/>  
	<link rel='stylesheet prefetch' href="{{ asset('css/font-awesome/css/font-awesome.min.css')}}"/>
	<link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet"/>


</head>

<body class="fixed-sn white-skin container-fluid">
    <!--Double navigation-->
    <header id="head">
        <!-- Sidebar navigation -->
        <div id="slide-out" class="side-nav fixed">
          <ul class="custom-scrollbar">
              <!-- Logo chính-->
				<li>
                    <div class="logo-wrapper waves-light" style="width:auto; height:160px;">
                        <a href="{{ url('/') }}" title="Đây Là Trang Chủ" ><img src="{{ asset('images/Untitled-1.gif') }}" class="img-fluid flex-center" ></a>
					</div>
				</li>
             
              
              <!--/Social-->
              <!--Search Form-->
              <li>
                  <form class="search-form" role="search">
                      <div class="form-group md-form mt-0 pt-1 waves-light">
                          <input type="text" class="form-control" placeholder="Tìm Kiếm">
                      </div>
                  </form>
              </li>
              <!--/.Search Form-->
              <!-- Side navigation links -->
              <li>
                  <ul class="collapsible collapsible-accordion">
				  @if(Session::get('quyenhan')!=0)
                      <li><a class="collapsible-header waves-effect arrow-r" ><i class="fa fa-chevron-right"></i>Bánh<i class="fa fa-angle-down rotate-icon"></i></a>
                          <div class="collapsible-body">
                              <ul>
									<li><a href="{{ url('/banh/banh_danhsach') }}">Bánh</a></li>
									<li><a href="{{ url('/loaibanh/loaibanh_danhsach') }}">Loại Bánh</a>
									</li>
                              </ul>
                          </div>
                      </li>
					  @if(Session::get('quyenhan')==2)
                      <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-hand-pointer-o"></i>Tài khoản<i class="fa fa-angle-down rotate-icon"></i></a>
                          <div class="collapsible-body">
                              <ul>
                                    <li><a href="{{ url('xemtaikhoankh') }}">Khách Hàng</a></li>
									<li><a href="{{ url('xemtaikhoannv') }}">Nhân Viên</a></li>
                              </ul>
                          </div>
                      </li>
					  @endif
					   <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-hand-pointer-o"></i>Đơn Hàng<i class="fa fa-angle-down rotate-icon"></i></a>
                          <div class="collapsible-body">
                              <ul>
                                    <li><a href="{{ url('/hoadon/xemhoadon') }}">Hóa đơn</a></li>
									<li><a href="{{ url('/dathang/xemdonhang') }}">Đơn đặt hàng</a></li>
                              </ul>
                          </div>
                      </li>
					  @endif
					  <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-hand-pointer-o"></i>Xem yêu thích và đơn đặt hàng<i class="fa fa-angle-down rotate-icon"></i></a>
                          <div class="collapsible-body">
                              <ul>
                                    <li><a class="dropdown-item nav-link" href="{{ url('laybanhyeuthich') }}"><i class="icon-heart" style="color:pink"></i> Bánh yêu thích</a>
											</li>
									<li><a class="dropdown-item nav-link" href="{{url('xemdonhangkhachhang')}}"><i class="icon-file"></i> Xem đơn đặt hàng</a>
									</li>
                              </ul>
                          </div>
                      </li>
					  <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-hand-pointer-o"></i>Thông tin tài khoản<i class="fa fa-angle-down rotate-icon"></i></a>
                          <div class="collapsible-body">
                              <ul>
                                    <li><a href="{{ url('laythongtin') }}">Cập nhật thông tin</a></li>
									<li><a href="{{ url('doimatkhau') }}">Đổi mật khẩu</a></li>
                              </ul>
                          </div>
                      </li>
					  @if(Session::get('quyenhan')!=0)
						  <li><a class="collapsible-header waves-effect arrow-r" href="{{ url('/gopy/xem') }}"><i class="fa fa-hand-pointer-o"></i>Xem Hòm góp ý</a>
                        
                      </li>
					   <li><a class="collapsible-header waves-effect arrow-r" href="{{ url('/thongke') }}"><i class="fa fa-hand-pointer-o"></i>Xem thống kê</a>
                        
                      </li>
					  @endif

                    
                      
                  </ul>
              </li>
              <!--/. Side navigation links -->
          </ul>
          <div class="sidenav-bg mask-strong"></div>
        </div>
        <!--/. Sidebar navigation -->
        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav">
            <!-- SideNav slide-out button -->
			@if(Session::has('user'))
            <div class="float-left">
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
            </div>
			@endif
            <!-- Breadcrumb-->
            <div class="breadcrumb-dn mr-auto" style="padding-left:30px">
				<a href="{{ url('/') }}" title="Về Trang Chủ"><h2 class="fa fa-home img-fluid rounded-circle hoverable" style="color:#00688B"></h2></a>
			</div>
            <ul class="nav navbar-nav nav-flex-icons ml-auto">
                <li class="nav-item">
					<a href="{{ url('/giohang/xemgiohang') }}" class="nav-link btn btn-info btn-sm my-0 ">	
					<i class="icon-shopping-cart"></i>
				</a>
                </li>
                <li class="nav-item">
					 @if(Cart::getTotalQuantity()>0)						  
						  <span class="badge badge-danger counter">{{Cart::getTotalQuantity()}}</span>
						  @else
						  <span class="badge badge-primary counter">0</span>
					      @endif
                </li>
				@if(!Session::has('user'))
				 <li class="nav-item">
                    <a class="nav-link btn btn-info btn-rounded my-0 btn-sm waves-effect waves-light" href="{{ url('/dangky') }}">
						Đăng ký
					</a>
                </li>
				 <li class="nav-item">
					<a  href="{{ url('/dangnhap') }}" id="navbar-static-login" class="nav-link btn btn-info btn-rounded my-0 btn-sm waves-effect waves-light" >Đăng Nhập
					  <i class="fa fa-sign-in ml-2"></i>
					</a>	
				</li>
				@else
					@if(Session::get('quyenhan')==0)
	
							<li class="nav-item">
								<a   class="nav-link btn btn-info btn-rounded my-0 btn-sm waves-effect waves-light" >{{Session::get('tenuser')}}
								  <i class="icon-user "></i>
								</a>	
							</li>
							@elseif(Session::has('quyenhan')==1)
							<li class="nav-item">
								<a   class="nav-link btn btn-info btn-rounded my-0 btn-sm waves-effect waves-light" >{{Session::get('tenuser')}}
								  <i class="icon-user "></i>
								</a>	
							</li>
							@else
							<li class="nav-item">
								<a   class="nav-link btn btn-info btn-rounded my-0 btn-sm waves-effect waves-light" >{{Session::get('tenuser')}}
								  <i class="icon-user "></i>
								</a>	
							</li>						
							@endif  
				<li class="nav-item">
					<a  href="{{ url('/xuat') }}" id="navbar-static-login" class="nav-link btn btn-info btn-rounded my-0 btn-sm waves-effect waves-light" >Đăng Xuất
					  <i class="fa fa-sign-out ml-2"></i>
					</a>	
				</li>
				@endif
            </ul>
        </nav>
        <!-- /.Navbar -->
    </header>
	</br>
	</br>
	</br>
	</br>
	@yield('content')


<!-- Footer -->
<footer class="page-footer font-small mdb-color lighten-3 pt-4">

    <!-- Footer Links -->
    <div class="container text-center text-md-left">

      <!-- Grid row -->
      <div class="row">

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 mr-auto my-md-4 my-0 mt-4 mb-1">

          <!-- Content -->
          <h5 class="font-weight-bold text-uppercase mb-4">MINICAKE  Xin Chào! Quý Khách</h5>
          <p>Cám ơn quý khách dã ủng hộ MINICAKE.</p>
          <p>MINICAKE Kính chúng quý khách ngon miệng.</p>

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none">

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 mx-auto my-md-4 my-0 mt-4 mb-1">

          <!-- Links -->
          <h5 class="font-weight-bold text-uppercase mb-4">MINICAKE</h5>

          <ul class="list-unstyled">
            <li>
              <p>
                <a href="#!">Giới Thiệu</a>
              </p>
            </li>
            <li>
              <p>
                <a href="#!">Bánh Khuyến Mãi</a>
              </p>
            </li>
			<li>
              <p>
                <a href="#!">Bánh Mới Nhất</a>
              </p>
            </li>
            
          </ul>

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none">

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 mx-auto my-md-4 my-0 mt-4 mb-1">

          <!-- Contact details -->
          <h5 class="font-weight-bold text-uppercase mb-4">Hỗ Trợ Khách Hàng</h5>

          <ul class="list-unstyled">
            <li>
              <p>
                <i class="fa fa-home mr-3"></i> Long Xuyên An Giang</p>
            </li>
            <li>
              <p>
                <i class="fa fa-envelope mr-3"></i> tiembanhhdemo@gmail.com</p>
            </li>
            <li>
              <p>
                <i class="fa fa-phone mr-3"></i> + 84 35 228 3633</p>
            </li>
            <li>
              <p>
                <i class="fa fa-print mr-3"></i> + 09 90 09 09 09</p>
            </li>
          </ul>

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none">

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 text-center mx-auto my-4">

          <!-- Social buttons -->
          <h5 class="font-weight-bold text-uppercase mb-4">Liên Kết Với chúng tôi</h5>

          <!-- Facebook -->
          <a type="button" class="btn-floating btn-fb" href="https://www.facebook.com/letrongky.dh16pm">
            <i class="fa fa-facebook"></i>
          </a>
          <!-- Twitter -->
          <a type="button" class="btn-floating btn-tw"href="https://twitter.com">
            <i class="fa fa-twitter"></i>
          </a>
          <!-- Google +-->
          <a type="button" class="btn-floating btn-gplus"href="https://www.google.com/">
            <i class="fa fa-google-plus"></i>
          </a>
          <!-- Dribbble -->
          <a type="button" class="btn-floating btn-dribbble"href="https://dribbble.com/">
            <i class="fa fa-dribbble"></i>
          </a>
		  

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2018 Copyright:
      <a href="https://mdbootstrap.com/education/bootstrap/"> MINICAKE.com</a>
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->
	
	<!--script-->
	<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
	
	<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>	
	<script type="text/javascript" src="{{ asset('js/jquery-1.10.2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.sequence-min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.carouFredSel-6.2.1-packed.js') }}"></script>
    <script defer src="{{ asset('js/jquery.flexslider.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/counter.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/script.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/ckfinder/ckfinder.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/Chart.min.js') }}"></script>
	
	<script type="text/javascript">
	$(document).ready( function () {
    $('#myTable').DataTable({
	"aLengthMenu": [[5,10,15,20,-1],[5,10,15,20,"Tất Cả"]],
	"oLanguage":{
    "sProcessing":   "Đang xử lý...",
    "sLengthMenu":   "Xem _MENU_ mục",
    "sZeroRecords":  "Không tìm thấy dòng nào phù hợp",
    "sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
    "sInfoEmpty":    "Đang xem 0 đến 0 trong tổng số 0 mục",
    "sInfoFiltered": "(được lọc từ _MAX_ mục)",
    "sInfoPostFix":  "",
    "sSearch":       "Tìm:",
    "sUrl":          "",
    "oPaginate": {
        "sFirst":    "Đầu",
        "sPrevious": "<p class='icon-hand-left'></p>",
        "sNext":     "<p class='icon-hand-right'></p>",
        "sLast":     "Cuối"
    }}

	});
	});
	</script>
	<script>
		CKEDITOR.replace( 'editor1',
		{
			filebrowserBrowseUrl : 'http://localhost:8080/CuaHangBanh-vs2/public/js/ckfinder/ckfinder.html',
			filebrowserImageBrowseUrl : 'http://localhost:8080/CuaHangBanh-vs2/public/js/ckfinder/ckfinder.html?type=Images',
			filebrowserUploadUrl : 'http://localhost:8080/CuaHangBanh-vs2/public/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
			filebrowserImageUploadUrl : 'http://localhost:8080/CuaHangBanh-vs2/public/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		});
		
	</script>
	<script>
        
        // SideNav Initialization
        $(".button-collapse").sideNav();

    </script>
	<script type="text/javascript">
			function BrowseServer()
			{
				var finder = new CKFinder();
				finder.basePath = '../';
				finder.selectActionFunction = function(fileUrl) {
					document.getElementById('hinhbanh').value = fileUrl.substring(fileUrl.lastIndexOf('/') + 1);
				};
				finder.popup();
			}
		</script>
	<script>
    $(document).ready(function(){

        $('.col-md-4').hover(
            // trigger when mouse hover
            function(){
                $(this).animate({
                    marginTop: "-=1%",
                },200);
            },

            // trigger when mouse out
            function(){
                $(this).animate({
                    marginTop: "0%"
                },200);
            }
        );
		 
    });
	function validateForm()
	{
		// Bước 1: Lấy giá trị của username và password
		var tungay = document.getElementById('tungay').value;
		var denngay = document.getElementById('denngay').value;
		// Bước 2: Kiểm tra dữ liệu hợp lệ hay không
		//var seconds = (- tungay.getTime()) / 1000;
		var tungay1=tungay.split("-");
		var tungay2;
		var denngay1=denngay.split("-");
		var denngay2;
		for(var i=0;i<tungay1.length;i++)
		{
			tungay2+=tungay1[i];
		}
		for(var i=0;i<denngay1.length;i++)
		{
			denngay2+=denngay1[i];
		}
		var denngay1=denngay.split("-");
		if (tungay == ''){
			alert('Bạn chưa nhập ngày bắt đầu');
			return false;
		}
		else if (denngay == '')
		{
			alert('Bạn chưa nhập ngày kết thúc');
			return false;
		}
		else if(tungay2>denngay2)
		{
			alert('Ngày kết thúc bé hơn ngày bắt đầu');
			return false;
		}
		else{
			
			return true;
		}
	 
		return false;
	}
	</script>
	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var ctxx = document.getElementById("myBar").getContext('2d');
		var ctxxx = document.getElementById("polarArea").getContext('2d');
		var Soluongthanhphan=[];
		var maunen = [];
		var maunenkh = [];
		var Giatien=[];
		var Giatienkh=[];
		var ten=[];
		var khachhang=[];
		
		
		@if(Session::has('kiemtrahang')&&isset($banh))
		@php $i=0; @endphp
		@foreach($banh as $value)
			ten[{{$i}}]='{{$value->TenBanh}}';
			Soluongthanhphan[{{$i}}]={{$value->soluongtong}};
			Giatien[{{$i}}]={{$value->giatientong*$value->soluongtong}};
			
			maunen[{{$i}}]='rgba('+Math.floor(Math.random() * 256) +','+Math.floor(Math.random() * 1) +','+Math.floor(Math.random() * 256)+', 0.2)';
			@php $i++;@endphp;
		@endforeach
		@php $i=0; @endphp
		@foreach($khachhang as $value)
			khachhang[{{$i}}]='{{$value->TenKhachHang}}';
			Giatienkh[{{$i}}]={{$value->giatientong}};
			maunenkh[{{$i}}]='rgba('+Math.floor(Math.random() * 256) +','+Math.floor(Math.random() * 256) +','+Math.floor(Math.random() * 256)+', 0.2)';
			@php $i++;@endphp;
		@endforeach
		@endif
		
		
		
		var myChart = new Chart(ctx, {
			type: 'pie',
			data: {
				labels: ten,
				datasets: [{
					label: 'Số lượng',
					data: Soluongthanhphan,
					backgroundColor: maunen,
					borderColor:maunen,
					borderWidth: 1
				}]
			},
			
		});
		var polarArea = new Chart(ctxxx, {
			type: 'polarArea',
			data: {
				labels: ten,
				datasets: [{
					label: 'Số lượng',
					backgroundColor: maunen,
					data: Giatien,
					borderWidth: 1
				}]
			},
		
			
		});
		var myBar = new Chart(ctxx, {
			type: 'bar',
			data: {
				labels: khachhang,
				datasets: [{
					label: 'Giá tiền',
					data: Giatienkh,
					backgroundColor: maunenkh,
					borderColor:maunenkh,
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
	<script>
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 900);
            });
        });
    </script>
</body>
</html>
