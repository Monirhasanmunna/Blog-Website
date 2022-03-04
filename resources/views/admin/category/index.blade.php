@extends('layouts.admin.dashboard')

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Category List</li>
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
                    <h3 class="">Category List</h3>
                    <a class="btn btn-primary" href="{{route('category.create')}}">Add Category</a>
                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Slugs</th>
                      <th>Description</th>
                      <th class="text-center" colspan="3" style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  @if($categories)
                  <tbody>
                    @foreach($categories as $data)
                    <tr>
                      <td>{{++$i}}</td>
                      <td>{{$data->name}}</td>
                      <td>
                        <div">
                          <div>{{$data->slug}}</div>
                        </div>
                      </td>
                      <td>{{ Str::words($data->description,15) }}</td>
                      <td><a class="btn btn-sm btn-primary" href="{{$data->id}}">Show</a></td>
                      <td><a class="btn btn-sm btn-info" href="{{$data->id}}">Edit</a></td>
                      <td><a class="btn btn-sm btn-danger" href="{{$data->id}}">Delete</td>
                    </tr>
                    @endforeach
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
                {!! $categories->links() !!}
          </div>
        </div>
      </div>
    </div>
@endsection    