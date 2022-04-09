@extends('layouts.admin.dashboard')

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Create User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{route('user.index')}}">User List</a></li>
              <li class="breadcrumb-item active">Create User</li>
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
                    <h5 class="">User Create</h5>
                    <a class="btn btn-primary" href="{{route('user.index')}}">Back to User List</a>
                  </div>
              </div>
              <!-- /.card-header -->
             <div class="col-lg-9 col-md-12 col-s-12 m-auto">
                 
                <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                       <div class="form-group">
                         <label for="name">User Name</label>
                         <input type="text" class="form-control" id="name" name="name">
                       </div>

                       <div class="form-group">
                        <label for="email">User Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                      </div>

                      <div class="form-group">
                        <div class="custom-file mt-4 mb-3">
                          <input type="file" class="custom-file-input" id="image" name="image">
                          <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                      </div>

                       <div class="form-group">
                        <label for="description">User Description</label>
                        <textarea type="text" class="form-control" rows="8" id="description" name="description"></textarea>
                      </div>

                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                      </div>

                       <button type="submit" class="btn btn-lg btn-primary">Submit</button>

                     </div>
                   </form>
             </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('style')
    <link rel="stylesheet" href="{{asset('admin/css/summernote-bs4.css')}}">
@endsection

@section('script')
    <script src="{{asset('admin/js/summernote-bs4.js')}}"></script>
    <script>
      $('#description').summernote({
        placeholder: 'Write Description Here',
        tabsize: 2,
        height: 300
      });
    </script>
@endsection