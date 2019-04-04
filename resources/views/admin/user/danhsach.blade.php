@extends('admin.layouts.index')
@section('content')
	<h1 class="page-header">
                        NHÂN VIÊN
                        <a href="admin/user/them" class="btn btn-success">Thêm</a>
                    </h1>
                    <hr>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Nhân viên</li>
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
                            <div class="col-sm-12" style="background-color: #ffff">
                            <table class="table table-condensed" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                     <tr>
                                        <th rowspan="1" colspan="1">ID</th>
                                        <th rowspan="1" colspan="1">Họ và Tên</th>
                                        <th rowspan="1" colspan="1">Ngày sinh</th>
                                        <th rowspan="1" colspan="1">Gioi tính</th>
                                        <th rowspan="1" colspan="1">Địa chỉ</th>
                                        <th rowspan="1" colspan="1">Email</th>
                                        <th rowspan="1" colspan="1">Điện thoại</th>
                                        <th rowspan="1" colspan="1">Doanh thu</th>
                                        <th rowspan="1" colspan="1">Quyền</th>
                                        <th rowspan="1" colspan="1">Trạng thái</th>
                                    </tr>
                               </thead>
                                <tbody>
                                   @foreach($user as $u)
                                      <tr>
                                          <td>{{$u->id}}</td>
                                          <td>{{$u->tennv}}</td>
                                          <td>{{$u->ngaysinh}}</td>
                                          <td>
                                              @if($u->gioitinh == 1)
                                              {{"Nữ"}}
                                              @else
                                              {{"Nam"}}
                                              @endif
                                          </td>
                                          <td>{{$u->diachi}}</td>
                                          <td>{{$u->email}}</td>
                                          <td>{{$u->sdt}}</td>
                                          <td>{{$u->doanhthu}}</td>
                                          <td>
                                              @if($u->quyen == 1)
                                              {{"Admin"}}
                                              @else
                                              {{"Nhân viên"}}
                                              @endif
                                          </td>

                                          <td>
                                              <a class="btn btn-info" href="admin/user/sua/{{$u->id}}"><i class="glyphicon glyphicon-edit"></i>      Sửa</a>
                                              <a class="btn btn-danger" href="admin/user/xoa/{{$u->id}}"><i class="glyphicon glyphicon-remove-sign"></i>       Xóa</a>
                                          </td>
                                      </tr>
                                   @endforeach
                                </tbody>
                            </table>


                            </div>
                        </div>
                    </div>
@endsection