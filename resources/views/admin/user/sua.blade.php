@extends('admin.layouts.index')
@section('content')
<h1 class="page-header">
                    SỬA NHÂN VIÊN
                    </h1>
                    <hr>
                    <!-- Breadcrumbs-->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Dashboard</a>
                        </li>
                         <li class="breadcrumb-item">
                            <a href="index.php">Nhân viên</a>
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

                            <form class="form-horizontal" action="admin/user/sua/{{$user->id}}" method="POST" enctype="multipart/form-data">
								<input type="hidden" name="_token" value="{{csrf_token()}}"/>

                                <div class="form-group row">
                                    <label for="inputten" class="col-sm-2 col-form-label">Tài khoản</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="inputten" placeholder="Tài khoản" name="taikhoan" value="{{$user->taikhoan}}" readonly="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <input type="checkbox" id="changepassword" name="changepassword" >
                                    <label for="inputten" class="col-sm-2 col-form-label">Đổi mật khẩu</label>
                                    <div class="col-sm-8">
                                        <input type="password" class=" password form-control " placeholder="Mật khẩu" name="password" value="" disabled="">
                                    </div>
                                </div>

                                 <div class="form-group row">
                                    <label for="inputten" class="col-sm-2 col-form-label">Nhập lại mật khẩu</label>
                                    <div class="col-sm-8">
                                        <input type="password" class=" password form-control "  placeholder="Nhập lại mật khẩu" name="nhaplaipassword" value="" disabled="">
                                    </div>
                                </div>

								<div class="form-group row">
                                    <label for="inputten" class="col-sm-2 col-form-label">Họ và tên</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="inputten" placeholder="Họ và tên" name="tennv" value="{{$user->tennv}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputten" class="col-sm-2 col-form-label">Gioi tính</label>
                                    <div class="col-sm-2">
                                        <label class="radio-inline"><input type="radio"  name="gioitinh" value="0"
                                        	@if ($user->gioitinh == 0)
                                        		{{"checked"}}
                                        	@endif
                                        >Nam</label>
                                    </div>
                                    <div class="col-sm-2">
                                        <label class="radio-inline"><input type="radio"  name="gioitinh" value="1"
                                        	@if ($user->gioitinh == 1)
                                        		{{"checked"}}
                                        	@endif
                                         >Nữ</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputten" class="col-sm-2 col-form-label">Số điện thoại</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="inputten" placeholder="Số điện thoại" name="sdt" value="{{$user->sdt}}">
                                    </div>
                                </div>

								<div class="form-group row">
                                    <label for="inputten" class="col-sm-2 col-form-label">Địa chỉ</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="inputten" placeholder="Địa chỉ" name="diachi" value="{{$user->diachi}}">
                                    </div>
                                </div>

								<div class="form-group row">
                                    <label for="inputten" class="col-sm-2 col-form-label">Ngày sinh</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" id="inputten" placeholder="Ngày sinh" name="ngaysinh" value="{{$user->ngaysinh}}">
                                    </div>
                                </div>



								<div class="form-group row">
                                    <label for="inputten" class="col-sm-2 col-form-label">Doanh thu</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="inputten" placeholder="Doanh thu" name="doanhthu" value="{{$user->doanhthu}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputten" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" id="inputten" placeholder="email" name="email" value="{{$user->email}}" readonly="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputten" class="col-sm-2 col-form-label">Quyền</label>
                                    <div class="col-sm-2">
                                        <label class="radio-inline"><input type="radio" name="quyen" value="0"
                                        	@if ($user->quyen == 0)
                                        		{{"checked"}}
                                        	@endif
                                        	>Nhân viên</label>
                                    </div>
                                    <div class="col-sm-2">
                                        <label class="radio-inline"><input type="radio" name="quyen" value="1"
	                                        @if ($user->quyen == 1)
	                                        	{{"checked"}}
	                                        @endif
                                        >Admin</label>
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


@section('script')
        <script>
            $(document).ready(function(){
                $("#changepassword").change(function(){
                        if($(this).is(":checked"))
                        {
                            $(".password").removeAttr('disabled');
                        }
                        else
                        {
                            $(".password").attr('disabled','');
                        }
                });
            });
        </script>
@endsection