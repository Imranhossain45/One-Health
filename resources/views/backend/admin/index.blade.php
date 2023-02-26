@extends('layouts.backend')
@section('content')
<h2>Welcome to the Paradise <b style="color: #008cff">{{ Auth::user()->name }}</b></h2>
@endsection