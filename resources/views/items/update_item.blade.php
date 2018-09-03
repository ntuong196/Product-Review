@extends('layouts.master')

@section('title')
    Edit review
@endsection
  

@section('content')
<h2>Edit <a href="{{ url("item_detail/$item->id") }}"> {{ $item->summary }} </a> Information</h2>

<form method="post" action="/update_item_action">
{{csrf_field()}}

<p>
<label>ID: {{$item -> id}} (Can not Edit)</label> 
<input style="visibility: hidden;" name="id" value="{{$item -> id}}" >
</p>

    
<p>
<label>Name: {{$item->summary }} </label> <br>
<input type="text" name="summary" placeholder="New Name">
</p>

<p>
<label>Manufacturer: {{$item->manufacturer }}</label> <br>
<input type="text" name="manufacturer" placeholder="New Manufacturer">
</p>


<input type="submit" value="Update item">
</form>
@endsection