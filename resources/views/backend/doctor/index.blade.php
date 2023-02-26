@extends('layouts.backend')
@section('content')
 


  <div class="container">
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
                <h4 class=" text-center">Active Doctors</h4>
              </div>
              <div class="card-body">
                <table class=" table">
                  <thead class="text-center">
                    <tr>
                      <th>Id</th>
                      <th>Photo</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Designation</th>
                      <th>Phone</th>
                      <th>Doctor Id</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class=" table-responsive">

                    @foreach ($activeDoctors as $doctor)
                      <tr>
                        <td>{{ $doctor->id }}</td>
                        <td>
                          <img src="{{ asset('storage/doctor/' . $doctor->photo) }}" width="60" alt="image">
                        </td>
                        <td>{{ $doctor->name }}</td>
                        <td>{{ $doctor->email }}</td>
                        <td>{{ $doctor->designation }}</td>
                        <td>{{ $doctor->phone }}</td>
                        <td>{{ $doctor->doctor_id }}</td>
                        <td>

                          <a href="{{ route('backend.doctor.edit', $doctor->id) }}" class=" btn btn-sm btn-info">Edit</a>
                          <a href="{{ route('backend.doctor.status', $doctor->id) }}"
                            class=" btn {{ $doctor->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $doctor->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                          <a href="{{ route('backend.doctor.trash', $doctor->id) }}"
                            class=" btn btn-sm btn-warning">Trash</a>


                          </form>
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
                <h4 class=" text-center">Draft doctors</h4>
              </div>
              <div class="card-body">
                <table class=" table">
                  <thead class="text-center">
                    <tr>
                      <th>Id</th>
                      <th>Photo</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Designation</th>
                      <th>Phone</th>
                      <th>Doctor Id</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class=" table-responsive">

                    @foreach ($draftDoctors as $doctor)
                      <tr>
                        <td>{{ $doctor->id }}</td>
                        <td>
                          <img src="{{ asset('storage/doctor/' . $doctor->photo) }}" width="60" alt="image">
                        </td>
                        <td>{{ $doctor->name }}</td>
                        <td>{{ $doctor->email }}</td>
                        <td>{{ $doctor->designation }}</td>
                        <td>{{ $doctor->phone }}</td>
                        <td>{{ $doctor->doctor_id }}</td>
                        <td>

                          <a href="{{ route('backend.doctor.edit', $doctor->id) }}" class=" btn btn-sm btn-info">Edit</a>
                          <a href="{{ route('backend.doctor.status', $doctor->id) }}"
                            class=" btn {{ $doctor->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">{{ $doctor->status == 'publish' ? 'Draft' : 'Publish' }}</a>
                          <a href="{{ route('backend.doctor.trash', $doctor->id) }}"
                            class=" btn btn-sm btn-warning">Trash</a>


                          </form>
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
                <h4 class=" text-center">Trashed doctors</h4>
              </div>
              <div class="card-body">
                <table class=" table">
                  <thead class="text-center">
                    <tr>
                      <th>Id</th>
                      <th>Photo</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Designation</th>
                      <th>Phone</th>
                      <th>Doctor Id</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class=" table-responsive">

                    @foreach ($trashDoctors as $doctor)
                      <tr>
                        <td>{{ $doctor->id }}</td>
                        <td>
                          <img src="{{ asset('storage/doctor/' . $doctor->photo) }}" width="60" alt="image">
                        </td>
                        <td>{{ $doctor->name }}</td>
                        <td>{{ $doctor->email }}</td>
                        <td>{{ $doctor->designation }}</td>
                        <td>{{ $doctor->phone }}</td>
                        <td>{{ $doctor->doctor_id }}</td>
                        <td>

                          <a href="{{ route('backend.doctor.reStore', $doctor->id) }}"
                            class=" btn btn-sm btn-success">Restore</a>
                          <a href="{{ route('backend.doctor.delete', $doctor->id) }}"
                            class=" btn btn-sm btn-danger" onclick="return confirm('Are you Sure to Delete?')"> Delete </a>


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
    </div>
  </div>
@endsection
