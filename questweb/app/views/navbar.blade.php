    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ URL::route("home") }}"><img src="/q_inverse.png" class="img-rounded img-responsive" style="max-height: 100%; height: auto;"/></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            @if (Auth::check())
              @foreach(Auth::user()->getHomeLinks() as $key => $value)
                <li>
                  <a href="{{ $value[0] }}">{{ $key }}</a>
                </li>
              @endforeach
              <li> 
                <a href="{{ URL::route("logout") }}">Logout</a>
              </li>
            @endif
            @yield('navbar')
          </ul>
        </div>
      </div>
    </div>