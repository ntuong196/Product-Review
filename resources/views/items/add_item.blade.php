@extends('layouts.master')

@section('title')
    List of Product
@endsection
  
@section('content')
<h2>Add a Product</h2>
<form method="post" action="/add_item_action" >
{{ csrf_field() }}
<p>
<label>ID: </label> <br>
<input type="text" name="id">
</p>
<p>
<label>Name: </label> <br>
<input type="text" name="summary">
</p>
<p>
<label>Manufacturer: </label> <br>
<textarea name="manufacturer"></textarea>
</p>
<p>
<label>Review: </label> <br>
<input type="text" name="review">
</p>
<input type="submit" value="Add item">
</form> 

@endsection