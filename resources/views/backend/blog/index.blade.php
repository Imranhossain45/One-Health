@extends('layouts.backend')
@section('content')
{{--   <div class="container-fluid page__heading-container">
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
                @foreach ($activeBlogs as $blog)
                  <tr>
                    <td>{{ $blog->id }}</td>
                    <td>
                      <img src="{{ asset('storage/blog/bPhoto/' . $blog->bPhoto) }}" width="60" height="60"
                        alt="">
                    </td>
                    <td>
                      <img src="{{ asset('storage/blog/aPhoto/' . $blog->aPhoto) }}" width="60" height="60"
                        alt="">
                    </td>
                    <td>{{ Str::limit($blog->title, 30, '...') }}</td>
                    <td>{{ Str::limit($blog->description, 30, '...') }}</td>
                    <td>{{ $blog->created_at->diffForHumans() }}</td>
                    <td>
                      <a href="{{ route('backend.blog.edit', $blog->id) }}" class="btn btn-primary">Edit</a>

                      <a href="{{ route('backend.blog.trash', $blog->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div> --}}

  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class=" col-lg-12">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">

          <li class="nav-item" role="presentation">
            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#active"><b>Active</b></button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#draft"><b>Draft</b></button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#trash"><b>Trash</b></button>
          </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active" id="active">
            <div class="card">
              <div class="card-header">
                <h4 class=" text-center">Active Blogs</h4>
              </div>
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
                    @foreach ($activeBlogs as $blog)
                      <tr>
                        <td>{{ $blog->id }}</td>
                        <td>
                          <img src="{{ asset('storage/blog/bPhoto/' . $blog->bPhoto) }}" width="60" height="60"
                            alt="">
                        </td>
                        <td>
                          <img src="{{ asset('storage/blog/aPhoto/' . $blog->aPhoto) }}" width="60" height="60"
                            alt="">
                        </td>
                        <td>{{ Str::limit($blog->title, 30, '...') }}</td>
                        <td>{{ Str::limit($blog->description, 30, '...') }}</td>
                        <td>{{ $blog->created_at->diffForHumans() }}</td>
                        <td>
                          <a href="{{ route('backend.blog.edit', $blog->id) }}" class="btn btn-primary">Edit</a>
                          <a href="{{ route('backend.blog.status', $blog->id) }}"
                            class=" btn {{ $blog->status == 'published' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $blog->status == 'published' ? 'Draft' : 'Publish' }}</a>
                          <a href="{{ route('backend.blog.trash', $blog->id) }}" class="btn btn-warning">Trash</a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="draft">
            <div class="card">
              <div class="card-header">
                <h4 class=" text-center">Draft blogs</h4>
              </div>
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
                    @foreach ($draftBlogs as $blog)
                      <tr>
                        <td>{{ $blog->id }}</td>
                        <td>
                          <img src="{{ asset('storage/blog/bPhoto/' . $blog->bPhoto) }}" width="60" height="60"
                            alt="">
                        </td>
                        <td>
                          <img src="{{ asset('storage/blog/aPhoto/' . $blog->aPhoto) }}" width="60" height="60"
                            alt="">
                        </td>
                        <td>{{ Str::limit($blog->title, 30, '...') }}</td>
                        <td>{{ Str::limit($blog->description, 30, '...') }}</td>
                        <td>{{ $blog->created_at->diffForHumans() }}</td>
                        <td>
                          <a href="{{ route('backend.blog.edit', $blog->id) }}" class="btn btn-primary">Edit</a>
                          <a href="{{ route('backend.blog.status', $blog->id) }}"
                            class=" btn {{ $blog->status == 'published' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $blog->status == 'published' ? 'Draft' : 'Publish' }}</a>
                          <a href="{{ route('backend.blog.trash', $blog->id) }}" class="btn btn-warning">Trash</a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="trash">
            <div class="card">
              <div class="card-header">
                <h4 class=" text-center">Trashed blogs</h4>
              </div>
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
                    @foreach ($trashBlogs as $blog)
                      <tr>
                        <td>{{ $blog->id }}</td>
                        <td>
                          <img src="{{ asset('storage/blog/bPhoto/' . $blog->bPhoto) }}" width="60" height="60"
                            alt="">
                        </td>
                        <td>
                          <img src="{{ asset('storage/blog/aPhoto/' . $blog->aPhoto) }}" width="60" height="60"
                            alt="">
                        </td>
                        <td>{{ Str::limit($blog->title, 30, '...') }}</td>
                        <td>{{ Str::limit($blog->description, 30, '...') }}</td>
                        <td>{{ $blog->created_at->diffForHumans() }}</td>
                        <td>
                          <a href="{{ route('backend.blog.reStore', $blog->id) }}"
                            class=" btn btn-sm btn-success">Restore</a>
                          <a href="{{ route('backend.blog.delete', $blog->id) }}"
                            class=" btn btn-sm btn-danger" onclick="return confirm('Are you Sure to Delete?')">Delete</a>
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
    </div>
  </div>
@endsection
