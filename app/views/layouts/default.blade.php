<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    @include('includes.header')
</div>
<div class="container">
    <div class="col-sm-12">
        @yield('content')
     </div>
</div>
<div class="footer footer-inverse">
    @include('includes.footer')
</div>
</body>
</html>