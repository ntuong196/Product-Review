@extends('layouts.master')

@section('title')
    {{ $item->summary }} Review
@endsection
  
@section('content')
<h2>{{ $item->summary }} Review</h2>
<p>
{{ $item->review }}
<p>
<a href="{{ url("delete_item_action/$item->id") }}">Delete this item</a>
<p>
<a href="{{ url("update_item/$item->id") }}">Update this item</a>
<p>
<a href="{{ url('/') }}">Return to product list</a>
@endsection