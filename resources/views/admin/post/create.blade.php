@extends('layouts.admin.dashboard')

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Create Post</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{route('post.index')}}">Post List</a></li>
              <li class="breadcrumb-item active">Create Post</li>
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
                    <h5 class="">Post Create</h5>
                    <a class="btn btn-primary" href="{{route('post.index')}}">Back to Post List</a>
                  </div>
              </div>
              <!-- /.card-header -->
             <div class="col-lg-9 col-md-12 col-s-12 m-auto">
                 
                <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                    
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
                         <label for="title">Post Title</label>
                         <input type="text" class="form-control" id="title" value="{{old('title')}}" name="title">
                       </div>

                       <label for="category">Category</label>
                        <select class="form-control" id="category" name="category">
                          <option selected hidden>Select Option</option>
                          @foreach($category as $data)
                          <option value="{{$data->id}}">{{$data->name}}</option>
                          @endforeach
                        </select>
                       
                        <div class="form-group">
                          <div class="custom-file mt-4 mb-3">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Choose file</label>
                          </div>
                        </div>

                        @foreach($tags as $tag)
                        <div class="form-group">
                          <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" name="tags[]" type="checkbox" id="tag{{$tag->id}}" value="{{$tag->id}}">
                          <label for="tag{{$tag->id}}" class="custom-control-label">{{$tag->name}}</label>
                          </div>
                        </div>
                        @endforeach

                       <div class="form-group">
                        <label for="description">Description</label>
                        <textarea type="text" class="form-control" rows="8" id="description" name="description">{{old('description')}}</textarea>
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