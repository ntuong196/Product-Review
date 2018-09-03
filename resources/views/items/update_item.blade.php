@extends('layouts.master')

@section('title')
    Edit review
@endsection
  

@section('content')
<h2>Edit {{ $item->summary }} Information</h2>

<form method="post" action="/update_item_action">
{{csrf_field()}}

<p>
<label>ID: {{$item->id }}</label> <br>
<input type="hidden" name="id" value="{{$item->id }}">
</p>

    
<p>
<label>Name: {{$item->summary }} </label> <br>
</p>

<p>
<label>Manufacturer: {{$item->manufacturer }}</label> <br>
</p>


<p>    
<label>Details:</label> <br>
<textarea name="review">{{ $item->review }}</textarea>
</p>

<input type="submit" value="Update item">
</form>
@endsection