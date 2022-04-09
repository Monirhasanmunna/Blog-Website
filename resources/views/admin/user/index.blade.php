@extends('layouts.admin.dashboard')

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item active">User List</li>
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
                    <h3 class="">User List</h3>
                    <a class="btn btn-primary" href="{{route('user.create')}}">Add User</a>
                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Slugs</th>
                      <th class="text-center"  style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  @if($user)
                  <tbody >
                    @foreach($user as $data)
                    <tr>
                      <td class="align-middle">{{++$i}}</td>
                      <td class="align-middle"><img style="width: 50px;height:50px;border-radius:50%;" class="img-fluid" src="{{asset('uploads/'.$data->image)}}" alt=""></td>
                      <td class="align-middle">{{$data->name}}</td>
                      <td class="align-middle">{{ $data->email }}</td>
                      <td class="align-middle">
                        <div>
                          <div>{{$data->slug}}</div>
                        </div>
                      </td>
                      
                      <td class="d-flex justify-content-end " >
                      <a class="btn btn-sm btn-primary mr-2" href="{{route('user.edit',[$data->id])}}"><i  class=" fas fa-edit"></i></a>
                      <form method="POST" action="{{ route('user.destroy', [$data->id]) }}" class="mr-2">
                        @csrf
                       @method('Delete')
                        <button type="submit" class="btn btn-sm btn-danger btn-icon">
                          <i  class=" fas fa-trash"></i>
                        </button>
                      </form>
                      </td>
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
                {!! $user->links() !!}
          </div>
        </div>
      </div>
    </div>
@endsection    