@extends('admin.layouts.index')
@section('content')
<h1 class="page-header">
    THÊM BẤT ĐỘNG SẢN
</h1>
<hr>
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.html">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="index.php">Bất động sản</a>
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

        <form class="form-horizontal" action="admin/batdongsan/them" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>

            <div class="form-group row">
                <label for="inputten" class="col-sm-2 col-form-label">Tình Trạng</label>
                <div class="col-sm-8">
                    <select name="tinhtrang">
                        <option value="1">Tình trạng 1</option>
                        <option value="2">Tình trạng 2</option>
                        <option value="3">Tình trạng 3</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputten" class="col-sm-2 col-form-label">Chiều Dài</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputten" placeholder="Nhập chiều dài" name="chieudai" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputten" class="col-sm-2 col-form-label">Chiều Rộng</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputten" placeholder="Nhập chiều rộng" name="chieurong" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputten" class="col-sm-2 col-form-label">Diện Tích</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputten" placeholder="Nhập diện tích" name="dientich" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputten" class="col-sm-2 col-form-label">Đơn Giá</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputten" placeholder="Nhập đơn giá" name="dongia" value="">
                </div>
            </div>
            
            <div class="form-group row">
                <label for="inputten" class="col-sm-2 col-form-label">Mã số QSDD</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputten" placeholder="Nhập mã số quyền sử dụng đất" name="masoqsdd" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputten" class="col-sm-2 col-form-label">Mô tả</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputten" placeholder="Nhập mô tả" name="mota" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputten" class="col-sm-2 col-form-label">Huê Hồng</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputten" placeholder="Nhập huê hồng" name="huehong" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputten" class="col-sm-2 col-form-label">Tên đường</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputten" placeholder="Nhập tên đường" name="tenduong" value="">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputten" class="col-sm-2 col-form-label">Số Nhà</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputten" placeholder="Nhập số nhà" name="sonha" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputten" class="col-sm-2 col-form-label">Phường(Xã)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputten" placeholder="Nhập phường hoặc xã" name="phuong" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputten" class="col-sm-2 col-form-label">Quận(Huyện)</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputten" placeholder="Nhập quận" name="quan" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputten" class="col-sm-2 col-form-label">(Tỉnh)Thành Phố</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputten" placeholder="Nhập tỉnh hoặc thành phố" name="thanhpho" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputten" class="col-sm-2 col-form-label">Loại bất động sản</label>
                <div class="col-sm-8">
                    <select name="laoiid">
                        @foreach($loaibds as $loai)
                        <option value="{{$loai->id}}">{{$loai->tenloai}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputten" class="col-sm-2 col-form-label">Khách Hàng</label>
                <div class="col-sm-8">
                    <select name="khid">
                        @foreach($khachhang as $kh)
                        <option value="{{$kh->id}}">{{$kh->hoten}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success"> Luu </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection