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

<form class="form-horizontal" action="admin/hinhanh/them" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
    <div class="form-group row">
        <label for="inputten" class="col-sm-2 col-form-label">BDS ID</label>
        <div class="col-sm-8">
            <select class="col-sm-8" name="bdsid" >
                @foreach($batdongsan as $bds)
                <option value="{{$bds->id}}">{{$bds->id}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="file-loading">
            <input id="file-loader" type="file" name="file[]" multiple class="file" data-overwrite-initial="false" data-theme="fas" >
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success"> Save </button>
        </div>
    </div>
</form>
</div>
</div>
<script type="text/javascript">
    $("file-loader").fileinput({
        'theme':'fas',
        'showUpload':'false',
        'previewFileType':'any',
        'uploadUrl':'',
        uploadExtraData:function(){
            return{
                _token: $("input[name='_token]").val(),
            }
        }

    });
</script>
@endsection