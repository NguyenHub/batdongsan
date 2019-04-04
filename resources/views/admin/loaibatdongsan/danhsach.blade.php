@extends('admin.layouts.index')
@section('content')
	<h1 class="page-header">
                        LOẠI BẤT ĐỘNG SẢN
                    </h1>
                    <hr>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Loại bất động sản</li>
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
                                        <th rowspan="1" colspan="1">Loại</th>
                                        <th rowspan="1" colspan="1">Thao tác</th>
                                    </tr>
                               </thead>
                                <tbody>
                                   @foreach($loaibds as $loai)
                                      <tr>
                                          <td>{{$loai->id}}</td>
                                          <td>{{$loai->tenloai}}</td>
                                          <td>
                                              <a class=" btn btn-info" href="admin/loaibatdongsan/sua/{{$loai->id}}"><i class="glyphicon glyphicon-edit"></i>      Sửa</a>
                                              <a class="delete btn btn-danger" href="admin/loaibatdongsan/xoa/{{$loai->id}}"><i class="glyphicon glyphicon-remove-sign"></i>       Xóa</a>
                                          </td>
                                      </tr>
                                   @endforeach
                                </tbody>
                            </table>


                            </div>
                        </div>
                    </div>
@endsection