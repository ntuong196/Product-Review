@extends('layouts.master')

@section('title')
   View Items by Manufacturer 
@endsection
  
@section('content')
<h2>Search for Products by a Manufacturerer </h2>
<input type="text" id="myInput" onkeyup="filterTable()" placeholder="Search for Manufacturer..">


<table id="myTable">
    <tr class="header">
    <th>ID</th>
    <th>Item</th>
    <th>Manufacturer</th>
    <th>Review</th>
      </tr>
      
    @foreach($items as $item)
    <tr>
    
    <td>{{$item -> id }}</td>
         <td>{{$item -> summary }}</td>
         <td>{{$item -> manufacturer }}</td>
         <td>{{ $item -> review}} </td>
         <br>
    </tr>
         
    @endforeach
    
</table>

<script>
function filterTable() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>
@endsection