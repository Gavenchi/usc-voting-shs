<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name', 'SHS') }} - @yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('img/usc.png') }}" rel="shortcut icon">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>
  <body>
    <div id="shs-voting">
      <header>
        <nav class="navbar navbar-toggleable-md fixed-top navbar-inverse bg-usc">
          <!-- Navbar content -->
          <div class="navbar-container">
            <button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand" href="{{ url('/') }}"><img height="32" src="{{ asset('img/usc.png') }}"> &nbsp;Senior High School</a>

            <div class="collapse navbar-collapse" id="navbar-collapse">
              <ul class="navbar-nav mr-auto">
                &nbsp;
              </ul>
              <ul class="navbar-nav">
                <!-- Authentication Links -->
                @if (Auth::guest())
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                @else
                @if (Auth::user()->admin)
                <li class="nav-item">
                  <a class="nav-link" href="/">Actual Results</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/anonresult">Anonymous Results</a>
                </li>
                @endif
                <li class="nav-item">

                  <a href="#" class="nav-link dropdown-toggle" id="user-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                  </a>
                  <div class="navbar-dropdown dropdown-menu dropdown-menu-right" aria-labelledby="user-menu">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item" type="button"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                      {{ csrf_field() }}
                    </form>
                  </div>
                </li>
                @endif
              </ul>
            </div>
          </div>
        </nav>
        <div class="jumbotron" style="margin-top: 56px">
          <div class="d-flex align-items-center justify-content-center">
            <div class="p-2">
              <img class="img-fluid" src="{{ asset('img/usc.png') }}">
            </div>
            <div class="p-2">
              <h2>University of San Carlos</h2>
              <p class="lead">SHS Student Council Elections 2017</p>
            </div>
          </div>
        </div>
      </header>

      <main>
        @yield('content')
      </main>

      <footer class="footer">
        <div class="container">
        <div class="row">
          <div class="col">
            <img width="64" height="64" src="{{ asset('img/usc.png') }}">
            <img src="{{ asset('img/code.png') }}" width="64" height="64" alt="">
          </div>
          <div class="col text-right">
            <p>Made by <i class="fa fa-twitter"></i><a href="https://twitter.com/ferrerojoshy">@ferrerojoshy</a> with love and wasted school time.</p>
            <p>Copyright &copy; 2017 <a href="http://usc.edu.ph">University of San Carlos</a> | <a href="http://codeusc.com/">Computer Driven Enthusiasts</a></p>
          </div>
        </div>
      </div>
      </footer>
    </div>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>