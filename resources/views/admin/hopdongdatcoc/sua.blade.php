@extends('admin.layouts.index')
@section('content')
<h1 class="page-header">
                    SỬA HỢP ĐỒNG ĐẶT CỌC
                    </h1>
                    <hr>
                    <!-- Breadcrumbs-->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Dashboard</a>
                        </li>
                         <li class="breadcrumb-item">
                            <a href="index.php">Hợp đồng đặt cọc</a>
                        </li>
                        <li class="breadcrumb-item active">Sửa</li>
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

                            <form class="form-horizontal" action="admin/hopdongdatcoc/sua/{{$hopdongdatcoc->id}}" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                                <div class="form-group row">
                                    <label for="inputten" class="col-sm-2 col-form-label">Khách Hàng</label>
                                    <div class="col-sm-8">
                                        <select name="khid">
                                            @foreach($khachhang as $kh)
                                            <option @if($hopdongdatcoc->khid==$kh->id) selected="selected" @endif  value="{{$kh->id}}">{{$kh->id." - ".$kh->hoten}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputten" class="col-sm-2 col-form-label">Bất động sản</label>
                                    <div class="col-sm-8">
                                        <select name="bdsid">
                                            @foreach($batdongsan as $bds)
                                            <option @if($hopdongdatcoc->bdsid==$bds->id) selected="selected" @endif  value="{{$bds->id}}">{{$bds->id}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputten" class="col-sm-2 col-form-label">Giá trị</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="inputten" placeholder="Nhập giá trị" name="giatri" value="{{$hopdongdatcoc->giatri}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputten" class="col-sm-2 col-form-label">Tình Trạng</label>
                                    <div class="col-sm-8">
                                        <select name="tinhtrang">
                                            <option @if($hopdongdatcoc->tinhtrang==1) selected="selected" @endif value="1"  >Tình trạng 1</option>
                                            <option @if($hopdongdatcoc->tinhtrang==2) selected="selected" @endif value="2"  >Tình trạng 2</option>
                                            <option @if($hopdongdatcoc->tinhtrang==3) selected="selected" @endif value="3" >Tình trạng 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputten" class="col-sm-2 col-form-label">Ngày lập</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" id="inputten" name="ngaylaphd" value="{{$hopdongdatcoc->ngaylaphd}}">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="inputten" class="col-sm-2 col-form-label">Ngày hết hạn</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" id="inputten" name="ngayhethan" value="{{$hopdongdatcoc->ngayhethan}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputten" class="col-sm-2 col-form-label">Trạng thái</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="inputten" placeholder="Nhập trạng thái" name="trangthai" value="{{$hopdongdatcoc->trangthai}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-success"> Lưu </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
@endsection