@extends('layouts.app')

@section('content')
	<br></br>		
	<br></br>
	@foreach($hom as $value)
	<div class="row justify-content-md-center">
	<div class="card col-10">
		  <div class="card-header bg-white">
			Tên người góp ý: {{$value->HoVaTen}}  <span class="badge badge-secondary">{{$value->Email}}<span>
		  </div>
		  <div class="card-body">
			<h5 class="card-title">{{$value->TieuDe}}</h5>
			<p class="card-text">{{$value->NoiDung	}}</p>
		  </div>
		  <div class="card-footer text-muted">
			Đăng ngày: {{$value->Ngay}}
		  </div>
	</div>
	</div>
	<br></br>
	@endforeach
	<div class="row justify-content-md-center">
		{{$hom->links()}}
	</div>
	<br></br>
		

@endsection
	
