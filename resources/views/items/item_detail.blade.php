@extends('layouts.master')

@section('title')
    {{ $item->summary }} Review
@endsection
  
@section('content')
<h2>{{ $item->summary }} Review</h2>

<table>
    <tr>
    <th>ID</th>
    <th>Product</th>
    <th>Manufacturer</th>
      </tr>
      
    <tr>
    <td>{{$item -> id }}</td>
    <td>{{$item -> summary }}</td>
    <td>{{$item -> manufacturer }}</td>
    </tr>
</table>

    <div class="detailBox">
    <ul class="commentList">
    @foreach($reviews as $review)  
    
        <li>
            <div class="commenterImage">
                <img src="http://placekitten.com/50/50" />
            </div>
            <div class="commentText">
                <p class="client">{{$review -> client}}</p><p class="">{{$review -> comment}}</p> <span class="date sub-text">rated: {{$review -> rating }}/5</span>
            </div>
        </li>
    

    @endforeach
    </ul>
    </div>
<p>    
<a href="{{ url("addreview/$item->id") }}">Add review for this item</a>
<p>
<a href="{{ url("delete_item_action/$item->id") }}">Delete this item</a>
<p>
<a href="{{ url("update_item/$item->id") }}">Update this item</a>
<p>
<a href="{{ url('/') }}">Return to product list</a>
@endsection