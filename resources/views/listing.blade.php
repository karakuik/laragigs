@extends('layout')

@section('content')
@if($listing == null)
    <p>No Listings Found</p>
@else
    <h2>{{ $listing['title'] }}</h2>
    <p>{{ $listing['description'] }}</p>
@endif
@endsection
