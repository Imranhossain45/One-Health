@extends('layouts.backend')
@section('content')
  <div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
      <div class="flex">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('backend.doctor.index') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Doctors</li>
          </ol>
        </nav>
        <h1 class="m-0">All Doctors</h1>
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
                <th>Photo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Designation</th>
                <th>Phone</th>
                <th>Doctor ID</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($doctors as $doctor)
                <tr>
                  <td>{{ $doctor->id }}</td>
                  <td>
                    <img src="{{ asset('storage/doctor/'. $doctor->photo) }}" width="60" height="60" alt="">
                  </td>
                  <td>{{ $doctor->name }}</td>
                  <td>{{ $doctor->email }}</td>
                  <td>{{ $doctor->designation }}</td>
                  <td>{{ $doctor->phone }}</td>
                  <td>{{ $doctor->doctor_id }}</td>
                  <td>
                    <a href="{{ route('backend.doctor.edit',$doctor->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('backend.doctor.delete',$doctor->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
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
