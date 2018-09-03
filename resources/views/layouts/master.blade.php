<!DOCTYPE html>
<html>
<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="{{secure_asset('css/wp.css')}}">
  <script type="text/javascript" src=""></script>
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<head>
  
</head>
<body>
  <div class="w3-top">
  <div class="w3-bar w3-black w3-card">
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="/" class="w3-bar-item w3-button w3-padding-large">HOME</a>
    <a href="/additem" class="w3-bar-item w3-button w3-padding-large w3-hide-small">ADD PRODUCT</a>
    <a href="/manufacturer" class="w3-bar-item w3-button w3-padding-large w3-hide-small">MANUFACTURER</a>
    
    <a href="javascript:void(0)" class="w3-padding-large w3-hover-red w3-hide-small w3-right"><i class="fa fa-search"></i></a>
  </div>
</div>
<br>
<br>


<div class="w3-content">
  @yield('content')
</div>



    
</body>
</html>