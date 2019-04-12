@extends('admin.layouts.index')
@section('content')
<div class="col-md-12">
	<div class="col-md-6">
		<h1 class="page-header">
			HÌNH BẤT ĐỘNG SẢN
		</h1>
	</div>
	<div class="col-md-6 w3-search-box"> 
		<form action="#" method="post">
			<input type="text" placeholder="Search..." required="">
			<input type="submit" value="">
		</form>	
	</div>
</div>
<hr>
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="index.html">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Hình bất động sản</li>
</ol>

<div class="clearfix">

</div>


<div class="row">
	<div class="col-md-12">
		@if(count($errors)>0)
		<div class="alert alert-danger">
			@foreach($errors->all() as $err)
			{{$err}}<br>
			@endforeach
		</div>
		@endif

		@if(session('thongbao'))
		<div class="alert alert-success">
			{{session('thongbao')}}
		</div>
		@endif
		<div class="col-sm-12" style="background-color: #ffff">
			<table class="table table-condensed" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
				<thead>
					<tr>
						<th rowspan="1" colspan="1">BĐS ID</th>
						<th rowspan="1" colspan="1">ID HÌNH</th>
						<th rowspan="1" colspan="1">HÌNH</th>
						<th rowspan="1" colspan="1"></th>
						<th rowspan="1" colspan="1">Thao Tác</th>
					</tr>
				</thead>
				<tbody>
					@foreach($hinhanh as $hinh)
					<tr>
						<td>{{$hinh->bdsid}}</td>
						<td>{{$hinh->id}}</td>
						<td><img src="hinhanh/upload/{{$hinh->hinh}}" alt="" style="max-width: 40px;max-height: 50px"></td>
						<td>
							<a class=" btn btn-info" href="admin/hinhanh/sua/{{$hinh->id}}"><i class="glyphicon glyphicon-edit"></i>      Sửa</a>
							<a class="delete btn btn-danger" href="admin/hinhanh/xoa/{{$hinh->id}}"><i class="glyphicon glyphicon-remove-sign"></i>       Xóa</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection