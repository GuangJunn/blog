@extends('layouts.admin')

@section('content')
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
            @if (session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>          
            @endif
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Danh sách tin tức</h3>
                    @csrf
                    @method('DELETE')
                  <div class="box-tools">
                    <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>STT</th>
                      <th>Tiêu đề</th>
                      <th>Ngày tạo</th>
                      <th>Trạng thái</th>
                      <th>Nội dung</th>
                      <th>Tác vụ</th>
                    </tr>
                    @php
                        $t=0
                    @endphp
                    @foreach ($posts as $post)
                        @php
                            $t++
                        @endphp
                        <tr>
                            <td>{{$t}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->created_at}}</td>
                            <td>
                                @if ($post->status == 1)
                                    <span class="label label-success">Hoạt động</span>
                                @else
                                    <span class="label label-warning text-light">Không hoạt động</span>
                                @endif
                            </td>
                            <td>{!!$post->content!!}</td>
                            <td>
                              <form action="{{route('post.destroy',$post->id)}}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <a href="{{route('post.edit',$post->id)}}" style="color: #fff; padding:5px; background:green"><i class="fa fa-fw fa-pencil"></i></a>
                                <button style="background: #444;border: 0;outline: 0;padding: 4px;color: white;" onclick="return confirm('Bạn có chắc xóa vĩnh viễn không ?')" style="color: #fff; padding:5px; background:red"><i class="fa fa-fw fa-trash"></i></button>
                              </form>                              
                            </td>
                          </tr>
                    @endforeach
                    
                  </table>
                  {{$posts->links()}}
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
          </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection