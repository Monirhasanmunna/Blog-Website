@extends('layouts.admin.dashboard')

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Post</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Post List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                 
                  <div class="d-flex justify-content-between text-center">
                    <h3 class="">Post List</h3>
                    <a class="btn btn-primary" href="{{route('post.create')}}">Post Create</a>
                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Image</th>
                      <th>Title</th>
                      <th>Category</th>
                      <th>Tags</th>
                      <th>Author</th>
                      <th class="text-center"  style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  @if($post)
                  <tbody >
                    @if($post->Count())
                    @foreach($post as $data)
                    <tr>
                      <td class="align-middle">{{++$i}}</td>
                      <td class="align-middle"><img class="img-thumbnail" style="width: 60px;" src="{{asset('uploads/'.$data->image)}}" alt=""></td>
                      <td class="align-middle">
                        <div>
                          <div>{{$data->title}}</div>
                        </div>
                      </td>
                      <td class="align-middle">{{ $data->category->name }}</td>
                      <td>
                        @foreach($data->tag as $tag)
                        <span class="badge badge-primary">{{$tag->name}}</span>
                        @endforeach
                      </td>
                      <td class="align-middle">{{ $data->user->name }}</td>
                      <td class="  d-flex justify-content-end" >
                      <a class="btn btn-sm btn-primary mr-2 " href="{{route('post.edit',[$data->id])}}"><i  class=" fas fa-edit"></i></a>
                      <form method="POST" action="{{ route('post.destroy', [$data->id]) }}" class="mr-2 ">
                      @csrf
                       @method('Delete')
                        <button type="submit" class="btn btn-sm btn-danger btn-icon">
                          <i  class=" fas fa-trash"></i>
                        </button>
                      </form>
                      </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                      <td colspan="6" class="text-center"><h5>No Post Found</h5></td>
                    </tr>
                    @endif
                  </tbody>
                  @endif
                </table>
                
              </div>
              <!-- /.card-body -->
            </div>
          </div>

          
        </div>

        <div class="d-flex ">
          <div class=" m-auto">
                {!! $post->links() !!}
          </div>
        </div>
      </div>
    </div>
@endsection    