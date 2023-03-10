@extends('layouts.backend')
@section('content')
  <div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
      <div class="flex">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('appointment.index') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Appointment</li>
          </ol>
        </nav>
        <h1 class="m-0">Appointments</h1>
      </div>
    </div>
  </div>
  <div class="container-fluid page__container">
    <div class="row">
      <div class="col-lg-12">
        <div class="card-header">
          <h1>All Appointment</h1>
        </div>
        <div class="card">
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Patient Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Doctor</th>
                  <th>Date</th>
                  <th>Message</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($appointments as $appointment)
                  <tr>
                    <td>{{ $appointment->id }}</td>
                    <td>{{ $appointment->name }}</td>
                    <td>{{ $appointment->email }}</td>
                    <td>{{ $appointment->phone }}</td>
                    <td>{{ $appointment->doctor }}</td>
                    <td>{{ $appointment->date }}</td>
                    <td>{{ Str::limit($appointment->message, 10, '...') }}</td>
                    <td>{{ $appointment->status }}</td>
                    <td>
                      <a href="{{ route('appointment.edit', $appointment->id) }}" class="btn btn-primary">Edit</a>
                      <a href="{{ route('appointment.approve',$appointment->id) }}" class="btn btn-success">Approve</a>
                      <a href="{{ route('appointment.cancel',$appointment->id) }}" class="btn btn-danger">Cancel</a>
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