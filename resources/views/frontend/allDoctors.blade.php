@extends('layouts.frontend')
@section('content')
  <div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Doctors</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">Our Doctors</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div>


  {{-- doctor section start --}}

  <div class="page-section bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">

          <div class="row">

            @foreach ($activeDoctors as $doctor)
              <div class="col-md-6 col-lg-4 py-3 wow zoomIn">
                <div class="card-doctor">
                  <div class="header">
                    <img src="../storage/doctor/{{ $doctor->photo }}" alt="">
                    <div class="meta">
                      <a href="{{ $doctor->phone }}"><span class="mai-call"></span></a>
                      <a href="{{ $doctor->phone }}"><span class="mai-logo-whatsapp"></span></a>
                    </div>
                  </div>
                  <div class="body">
                    <a href="" class="text-xl mb-0">{{ $doctor->name }}</a>
                    <span class="text-sm text-grey">{{ $doctor->designation }}</span>
                  </div>
                </div>
              </div>
            @endforeach

          </div>

        </div>
      </div>
    </div> <!-- .container -->
  </div> <!-- .page-section -->
  {{-- doctor section end --}}
@endsection
