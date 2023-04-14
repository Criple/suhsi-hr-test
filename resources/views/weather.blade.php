@extends('mainLayout')

@section('title')Погода@endsection
@section('stylesheets')

@endsection

@section('content')
    @if(!$weatherData)
        @include('parts.weather_empty')
    @else
        @include('parts.weather_data')
    @endif

@endsection

@section('javascripts')

@endsection
