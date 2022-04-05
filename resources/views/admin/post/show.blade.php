@extends('layouts.admin.dashboard')

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Show Post</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{route('post.index')}}">Post List</a></li>
              <li class="breadcrumb-item active">Show Post</li>
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
                    <h5 class="">Post Details: {{$post->title}}</h5>
                    <a class="btn btn-primary" href="{{route('post.index')}}">Back to Post List</a>
                  </div>
              </div>

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-s-12 p-3">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th style="width: 200px">Image</th>
                                        <th class="align-middle"><img style="width: 300px;" src="{{asset('uploads/'.$post->image)}}" alt=""></th>
                                    </tr>

                                    <tr>
                                        <th style="width: 200px">Tittle</th>
                                        <th>{{$post->title}}</th>
                                    </tr>

                                    <tr>
                                        <th style="width: 200px">Category</th>
                                        <th>{{$post->category->name}}</th>
                                    </tr>

                                    <tr>
                                        <th style="width: 200px">Tags</th>
                                        <th>
                                            @foreach($post->tag as $tag)
                                                <span class="badge badge-primary">{{$tag->name}}</span>
                                            @endforeach
                                        </th>
                                    </tr>

                                    <tr>
                                        <th style="width: 200px">Author</th>
                                        <th>{{$post->user->name}}</th>
                                    </tr>

                                    <tr>
                                        <th style="width: 200px">Description</th>
                                        <td>{!! $post->description !!}</td>
                                    </tr>
                                </tbody>
                        </table>
                        </div>
                    </div>

            </div>
          </div>
        </div>
      </div>
    </div>
@endsection    