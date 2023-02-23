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
            <form action="{{ route('backend.doctor.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class=" form-group">
                <b>Name:</b>
                <input type="text" name="name" class=" form-control" placeholder="Enter Doctor Name">
              </div>
              <div class=" form-group">
                <b>Email:</b>
                <input type="text" name="email" class=" form-control" placeholder="Enter Doctor Email">
              </div>
              <div class=" form-group">
                <b>Designation:</b>
                <input type="text" name="designation" class=" form-control" placeholder="Enter Doctor Designation">
              </div>
              <div class=" form-group">
                <b>Phone:</b>
                <input type="number" name="phone" class=" form-control" placeholder="Enter Doctor Phone">
              </div>
              <div class=" form-group">
                <b>Doctor Id:</b>
                <input type="number" name="doctor_id" class=" form-control" placeholder="Enter Doctor Doctor Id">
              </div>
              <div class=" form-group">
                <b>Photo:</b>
                <input type="file" name="photo" class=" form-control">
              </div>
              <button type="submit" name="submit" class="btn btn-sm btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection