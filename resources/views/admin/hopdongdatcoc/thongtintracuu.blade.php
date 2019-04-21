@extends('admin.layouts.index')
@section('content')
	<h1 class="page-header">
                         THÔNG TIN TRA CỨU
                    </h1>
                    <hr>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Hợp đồng đặt cọc</li>
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
                                        <th >Mã HĐ</th>
                                        <th >Mã KH</th>
                                        <th >Mã BĐS</th>
                                        <th >Giá trị</th>
                                        <th >Ngày bắt đầu</th>
                                        <th >Ngày kết thúc</th>
                                        <th >Tình trạng</th>
                                        <th >Trạng thái</th>
                                      </tr>
                               </thead>
                                <tbody>
                                   @foreach($hopdongdatcoc as $hddc)
                                      <tr>
                                          <td>{{$hddc->id}}</td>
                                          <td>{{$hddc->khid}}</td>
                                          <td>{{$hddc->bdsid}}</td>
                                          <td>{{$hddc->giatri}}</td>
                                          <td>{{$hddc->ngaylaphd}}</td>
                                          <td>{{$hddc->ngayhethan}}</td>
                                          <td>{{$hddc->tinhtrang}}</td>
                                          <td>{{$hddc->trangthai}}</td>
                                          <td>
                                              <a class="update glyphicon glyphicon-edit" href="admin/hopdongdatcoc/sua/{{$hddc->id}}"></a>
                                              <a class="delete glyphicon glyphicon-remove-sign" href="admin/hopdongdatcoc/xoa/{{$hddc->id}}"></a>
                                          </td>
                                      </tr>
                                   @endforeach
                                </tbody>
                            </table>


                            </div>
                        </div>
                    </div>
@endsection