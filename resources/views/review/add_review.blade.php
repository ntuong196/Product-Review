@extends('layouts.master')

@section('title')
    Add review
@endsection
  

@section('content')
<h2>Add review for <a href="{{ url("item_detail/$item->id") }}"> {{ $item->summary }} </a></h2>

<form method="post" action="/add_review_action">
{{csrf_field()}}

<p>
<label>ID: {{$item -> id}} (Can not Edit)</label> 
<input style="visibility: hidden;" name="id" value="{{$item -> id}}" >
</p>

    
<p>
<label>Client:  </label> <br>
<input type="text" name="client" placeholder="Your name">
</p>

<p>
<label>Rating: </label> <br>
<input type="text" name="rating" placeholder="Your rating from 1 to 5">
</p>

<p>
<label>Comment:  </label> <br>
<input type="text" name="comment" placeholder="Your comment">
</p>


<input type="submit" value="Add review">
</form>
@endsection