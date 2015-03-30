<html>
    @include('header')

    <body>
      @include('navbar')

      @yield('content')
    </body>

    <script src="/bootstrap/js/jquery.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    @yield('js')
</html>
