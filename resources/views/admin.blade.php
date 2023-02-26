@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2>Welcome to the Paradise {{ Auth::user()->name }}</h2>
    </div>
</div>
@endsection
