@extends('layouts.admin.dashboard')

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Tag</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{route('tag.index')}}">Tags List</a></li>
              <li class="breadcrumb-item active">Edit Tags</li>
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
                    <h5 class="">Edit: {{$tag->name}} Tag</h5>
                    <a class="btn btn-primary" href="{{route('category.index')}}">Back to Tag List</a>
                  </div>
              </div>
              <!-- /.card-header -->
             <div class="col-lg-6 col-md-6 col-s-8 m-auto">
                 
                <form action="{{route('tag.update',[$tag->id])}}" method="POST">
                    @method('PUT')
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
                         <label for="title">Category Name</label>
                         <input type="text" class="form-control" id="title" name="title" value="{{$tag->name}}">
                       </div>

                       <div class="form-group">
                        <label for="description">Category Description</label>
                        <textarea type="text" class="form-control" rows="8" id="title" name="description">{{$tag->description}}</textarea>
                      </div>

                       <button type="submit" class="btn btn-lg btn-primary">Update</button>

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