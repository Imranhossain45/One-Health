@extends('layouts.backend')
@section('content')
  <section>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card">
          <div class="card-header">
            <h1>Add Blog</h1>
          </div>
          <div class="card-body">
            <form action="{{ route('backend.blog.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class=" form-group">
                <b>Title:</b>
                <input type="text" name="title" class=" form-control" placeholder="Enter Blog Title">
              </div>
              <div class=" form-group">
                <b>Auther Name:</b>
                <input type="text" name="auther" class=" form-control" placeholder="Enter Blog Auther Name">
              </div>
              
              <div class=" form-group">
                <b>Blog Photo:</b>
                <input type="file" name="bPhoto" class=" form-control">
              </div>
              <div class=" form-group">
                <b>Auther Photo:</b>
                <input type="file" name="aPhoto" class=" form-control">
              </div>
              <div class=" form-group">
                <b>Description:</b>
                <textarea name="description" class=" form-control" rows="7"></textarea>
              </div>
              <button type="submit" name="submit" class="btn btn-sm btn-primary mt-3">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection