@extends('layouts.admin')

@section('content')
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('ckfinder/ckfinder.js')}}"></script>
<div class="content-wrapper" style="margin-left: 0;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Trang quản lý tin tức
      <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Tin tức</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Chỉnh sửa tin tức</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="{{route('post.update',$posts->id)}}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <div class="box-body">
              <div class="form-group">
                <label for="title">Tiêu đề: </label>
                @error('title')
                  <small class="form-text text-danger">{{$message}}</small>
                  @enderror
                  <input type="text" class="form-control" id="title" placeholder="Điền tiêu đề" name="title" value="{{$posts->title}}">
                </div>
              <div class="form-group">
                <label for="content">Nội dung: </label>
                @error('content')
                  <small class="form-text text-danger">{{$message}}</small>
                  @enderror
                  <textarea name="content" rows="10" cols="80" class="ckeditor">{!!$posts->content!!}
                </textarea>
                <script>
                  CKEDITOR.replace( 'content', {
                    filebrowserBrowseUrl: '{{asset('ckfinder/ckfinder.html')}}',
                    filebrowserUploadUrl: '{{asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files')}}',
                  </script>
                  </div>
                  <div class="form-group">
                    <label>Trạng thái: </label> 
                    @if ($posts->status == 1)
                    <span class="label label-success p-2">Hoạt động</span>
                @else
                <span class="label label-warning p-2">Không hoạt động</span>
                @endif
                <select class="form-control" name="status">
                  <option value="0">Chọn</option>
                  <option value="1">Hoạt động</option>
                  <option value="2">Không hoạt động</option>
                  </select>
                  </div>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary" name="btn-update">Cập nhật</button>
                    </div>
                    </div>
                    <!-- /.box-body -->
                    </form>
                    </div>
                    <!-- /.box -->
                    <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                    
                    </div>
      <!--/.col (left) -->
      <!-- right column -->
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
@endsection
} );