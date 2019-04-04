@extends('admin.layouts.index')
@section('content')
<h1 class="page-header">
                    THÊM LOẠI BẤT ĐỘNG SẢN
                    </h1>
                    <hr>
                    <!-- Breadcrumbs-->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Dashboard</a>
                        </li>
                         <li class="breadcrumb-item">
                            <a href="index.php">Loại bất động sản</a>
                        </li>
                        <li class="breadcrumb-item active">Thêm mới</li>
                    </ol>
                    <div class="clearfix"></div>
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

                            <form class="form-horizontal" action="admin/loaibatdongsan/them" method="post" enctype="multipart/form-data">
								<input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <div class="form-group row">
                                    <label for="inputten" class="col-sm-2 col-form-label">Tên loại</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="inputten" placeholder="Nhập tên loại" name="tenloai" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-success"> Save </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
@endsection