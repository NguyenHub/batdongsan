@extends('admin.layouts.index')
@section('content')
<h1 class="page-header">
    THÊM HỢP ĐỒNG CHUYỂN NHƯỢNG
</h1>
<hr>
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.html">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="index.php">Hợp đồng chuyển nhượng</a>
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

        <form class="form-horizontal" action="admin/hopdongchuyennhuong/them" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>

            <div class="form-group row">
                <label for="inputten" class="col-sm-2 col-form-label">Khách hàng</label>
                <div class="col-sm-8">
                    <select name="khid">
                        @foreach($khachhang as $kh)
                        <option value="{{$kh->id}}">{{$kh->hoten}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputten" class="col-sm-2 col-form-label">Bất động sản</label>
                <div class="col-sm-8">
                    <select name="bdsid">
                        @foreach($batdongsan as $bds)
                        <option value="{{$bds->id}}">{{$bds->id}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputten" class="col-sm-2 col-form-label">HĐ đặt cọc</label>
                <div class="col-sm-8">
                    <select name="dcid">
                        @foreach($datcoc as $dc)
                        <option value="{{$dc->id}}">{{$dc->id}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputten" class="col-sm-2 col-form-label">Giá trị</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputten" placeholder="Nhập giá trị" name="giatri" value="">
                </div>
            </div>
            
            <div class="form-group row">
                <label for="inputten" class="col-sm-2 col-form-label">Ngày lập</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" id="inputten" name="ngaylap" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputten" class="col-sm-2 col-form-label">Trạng thái</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputten" placeholder="Nhập trạng thái" name="trangthai" value="">
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