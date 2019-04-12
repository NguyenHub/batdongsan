@extends('admin.layouts.index')
@section('content')
	<h1 class="page-header">
                         BẤT ĐỘNG SẢN
                    </h1>
                    <hr>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Bất động sản</li>
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
                            <div class="" style="background-color: #ffff">
                            <table class="table-condensed" id="dataTable" width="100%"  style="width: 100%;">
                                <thead>
                                     <tr>
                                        <th >ID</th>
                                        <th >Tình Trạng</th>
                                        <th >Diện Tích</th>
                                        <th >Đơn Giá</th>
                                        <th >Dài</th>
                                        <th >Rộng</th>
                                        <th >Mã số QSDD</th>
                                        <th >Mô tả</th>
                                        <th >Huê Hồng</th>
                                        <th >Tên Đường</th>
                                        <th >Số Nhà</th>
                                        <th >Phường</th>
                                        <th >Quận</th>
                                        <th >Thành Phố</th>
                                        <th >Mã loại</th>
                                        <th >Mã KH</th>
                                        <th >Thao Tác</th>
                                    </tr>
                               </thead>
                                <tbody>
                                   @foreach($batdongsan as $bds)
                                      <tr>
                                          <td>{{$bds->id}}</td>
                                          <td>{{$bds->tinhtrang}}</td>
                                          <td>{{$bds->dientich}}</td>
                                          <td>{{$bds->dongia}}</td>
                                          <td>{{$bds->chieudai}}</td>
                                          <td>{{$bds->chieurong}}</td>
                                          <td>{{$bds->masoqsdd}}</td>
                                          <td>{{$bds->mota}}</td>
                                          <td>{{$bds->huehong}}</td>
                                          <td>{{$bds->tenduong}}</td>
                                          <td>{{$bds->sonha}}</td>
                                          <td>{{$bds->phuong}}</td>
                                          <td>{{$bds->quan}}</td>
                                          <td>{{$bds->thanhpho}}</td>
                                          <td>{{$bds->loaiid}}</td>
                                          <td>{{$bds->khid}}</td>
                                          <td>
                                              <a class="update glyphicon glyphicon-edit" href="admin/batdongsan/sua/{{$bds->id}}"></a>
                                              <a class="delete glyphicon glyphicon-remove-sign" href="admin/batdongsan/xoa/{{$bds->id}}"></a>
                                          </td>
                                      </tr>
                                   @endforeach
                                </tbody>
                            </table>


                            </div>
                        </div>
                    </div>
@endsection