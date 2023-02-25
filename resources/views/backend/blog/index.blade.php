@extends('layouts.backend')
@section('content')
  <div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
      <div class="flex">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('backend.blog.index') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Blogs</li>
          </ol>
        </nav>
        <h1 class="m-0">All Blogs</h1>
      </div>
    </div>
  </div>
  <div class="container-fluid page__container">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>B-Photo</th>
                <th>A-Photo</th>
                <th>Title</th>
                <th>Decription</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($blogs as $blog)
                <tr>
                  <td>{{ $blog->id }}</td>
                  <td>
                    <img src="{{ asset('storage/blog/bPhoto/'. $blog->bPhoto) }}" width="60" height="60" alt="">
                  </td>
                  <td>
                    <img src="{{ asset('storage/blog/aPhoto/'. $blog->aPhoto) }}" width="60" height="60" alt="">
                  </td>
                  <td>{{ $blog->title }}</td>
                  <td>{{ $blog->description }}</td>
                  <td>{{ $blog->status }}</td>
                  <td>
                    <a href="{{ route('backend.blog.edit',$blog->id) }}" class="btn btn-primary">Edit</a>
                    {{-- <form action="{{ route('backend.blog.delete',$blog->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to Delete?')">Delete</button>
                    </form> --}}
                    <a href="{{ route('backend.blog.delete',$blog->id) }}" class="btn btn-danger">Delete</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      </div>
    </div>
  </div>
@endsection
