@extends('layouts.master')

@section('title')
    List of Product
@endsection
  
@section('content')
<div class="header-title"><h2>Products List</h2></div>
<table>
    <tr>
    <th>ID</th>
    <th>Product</th>
    <th>Manufacturer</th>
      </tr>
      
    @foreach($items as $item)
    <tr>
    
    <td>{{$item -> id }}</td>
         <td><a href="{{url("item_detail/$item->id")}}" > {{$item -> summary }} </a></td>
         <td>{{$item -> manufacturer }}</td>
    </tr>
         
    @endforeach
    
</table>
@endsection