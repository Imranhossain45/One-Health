@extends('layouts.backend')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h1>My Appointment</h1>
          </div>
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Doctor</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($appoints as $appoint)
                  <tr>
                    <td>{{ $appoint->id }}</td>
                    <td>{{ $appoint->name }}</td>
                    <td>{{ $appoint->doctor }}</td>
                    <td>{{ $appoint->date }}</td>
                    <td>{{ $appoint->status }}</td>
                    <td>
                      
                      <a href="{{ route('appointment.delete',$appoint->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>
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