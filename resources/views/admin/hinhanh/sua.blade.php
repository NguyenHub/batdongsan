@extends('admin.layouts.index')
@section('content')
<h1 class="page-header">
    THÊM HÌNH BẤT ĐỘNG SẢN
</h1>
<hr>
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.html">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="index.php">Hình bất động sản</a>
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

<form class="form-horizontal" action="admin/hinhanh/sua/{{$hinh->id}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
    <div class="form-group">
        <div class="file-loading">
            <input id="file-loader" type="file" name="file"  class="file">
        </div>
    </div>
   {{--  <div class="form-group row">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success"> Save </button>
        </div>
    </div> --}}
</form>
</div>
</div>
<script type="text/javascript">
    $("#file-loader").fileinput({
        allowedFileTypes:'image',
        allowedFileExtensions: ['jpg', 'png', 'gif'],
        overwriteInitial: 'true',
        initialPreview: [
            "<img class='file-preview-image kv-preview-data' src='hinhanh/upload/{{$hinh->hinh}}'>",
        ],
        uploadExtraData:function(){
            return{
                _token: $("input[name='_token]").val(),
            }
        }

    });
    $("#file-loader").on("filepredelete", function(jqXHR) {
        var abort = true;
        if (confirm("Are you sure you want to delete this image?")) {
            abort = false;
        }
        return abort; // you can also send any data/object that you can receive on `filecustomerror` event
    });
</script>
@endsection