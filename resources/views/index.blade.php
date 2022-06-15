@extends('weather::layout')
@section('content')
<h1>Weather</h1>
@include('weather::form')
@include('weather::data')
@endsection