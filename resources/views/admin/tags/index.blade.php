@extends('layouts.admin.dashboard')

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tag</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Tag List</li>
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
                    <h3 class="">Tag List</h3>
                    <a class="btn btn-primary" href="{{route('tag.create')}}">Add Tag</a>
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
                      
                      <th class="text-center"  style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  @if($tags)
                  <tbody>
                    @if($tags->Count())
                    @foreach($tags as $data)
                    <tr>
                      <td>{{++$i}}</td>
                      <td>{{$data->name}}</td>
                      <td>
                        <div">
                          <div>{{$data->slug}}</div>
                        </div>
                      </td>
                      <td class="d-flex justify-content-end" >
                      <a class="btn btn-sm btn-primary mr-2" href="{{route('tag.edit',[$data->id])}}"><i  class=" fas fa-edit"></i></a>
                      <form method="POST" action="{{ route('tag.destroy', [$data->id]) }}" class="mr-2">
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
                      <td colspan="4" class="text-center"><h5>No data Found.</h5></td>
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
                {!! $tags->links() !!}
          </div>
        </div>
      </div>
    </div>
@endsection    