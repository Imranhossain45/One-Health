@extends('layouts.backend')
@section('content')
<section>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card">
          <div class="card-header">
            <h1>Add Doctor</h1>
          </div>
          <div class="card-body">
            <form action="{{ route('backend.doctor.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class=" form-group">
                <b>Name:</b>
                <input type="text" name="name" class=" form-control" placeholder="Enter Doctor Name" value="{{ $doctor->name }}">
              </div>
              <div class=" form-group">
                <b>Email:</b>
                <input type="text" name="email" class=" form-control" placeholder="Enter Doctor Email" value="{{ $doctor->email }}">
              </div>
              <div class=" form-group">
                <b>Designation:</b>
                <input type="text" name="designation" class=" form-control" placeholder="Enter Doctor Designation" value="{{ $doctor->designation }}">
              </div>
              <div class=" form-group">
                <b>Phone:</b>
                <input type="number" name="phone" class=" form-control" placeholder="Enter Doctor Phone" value="{{ $doctor->phone }}">
              </div>
              <div class=" form-group">
                <b>Doctor Id:</b>
                <input type="number" name="doctor_id" class=" form-control" value="{{ $doctor->doctor_id }}">
              </div>
              <div class=" form-group">
                <b>Photo:</b>
                <input type="file" name="photo" class=" form-control">
                <div>
                  <img src="{{ asset('storage/doctor/'. $doctor->photo) }}" width="60" height="60" alt="">
                </div>
              </div>
              <button type="submit" name="submit" class="btn btn-sm btn-primary mt-3">Update</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection