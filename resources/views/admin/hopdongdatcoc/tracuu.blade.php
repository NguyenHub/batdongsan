@extends('admin.layouts.index')
@section('content')
	<h1 class="page-header">
                         QUẢN LÝ HỢP ĐỒNG ĐẶT CỌC
                    </h1>
                    <hr>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Tìm kiếm trong hợp đồng đặt cọc</li>
                    </ol>
                    <div class="clearfix"></div>

                    <div class="row">
                      <div class="col-md-12">
                        @if($loi == 1)
                          <div class="alert alert-danger">Không tìm thấy hợp đồng</div>
                        @endif
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
                        </div>
                    </div>

                    <div class="row" align="center">
                      <form method="get" action="admin/hopdongdatcoc/search">
                        <input type="text" placeholder="Nhập id.." name="key" >
                        <input type="submit" value="Tìm">
                      </form>
                    </div>
@endsection