<!-- Stored in resources/views/layouts/app.blade.php -->
<html lang="en" class="gr__getbootstrap_com">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Projekt Kniznicny System">
      <meta name="author" content="xtamas01, xormos00, xlakat01, xkuzel06">
    <!-- Bootstrap core CSS -->
    <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>

    <link href="/css/template.css" rel="stylesheet">
    <title>PIS - @yield('title')</title>
  </head>

  <body>
    @if(auth()->check())
    <div class="container-fluid" style="">
      <div class="row">
          @section('sidebar')
          <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-slack sidebar" style="">
          <div style="">
            <div style="">
              <img id="logo" src="/img/library.svg" style="width:100%;">
            </div>
          </div>
          <ul class="nav nav-pills  flex-column">
            <li class="nav-item ">
              <a class="nav-link" href="/search">Search</a>
            </li>
          </ul>

          @if (Auth::user()->hasRole('admin'))
          <ul class="nav nav-pills  flex-column">
            <li class="nav-item">
              <a class="nav-link ajax-route" data-url="/users" data-title="User list">List of Users</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ajax-route" data-url="/users/create">Add New User</a>
            </li>
          </ul>
          <ul class="nav nav-pills flex-column">
            <li class="nav-item ">
              <a class="nav-link ajax-route" data-url="/books">List of Books</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ajax-route" data-url="/books/create">Add New Book</a>
            </li>
          </ul>
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link ajax-route" data-url="/borrows/create">Lend Book</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ajax-route" data-url="/borrows">Rentals</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ajax-route" data-url="/reservations">Reservations</a>
            </li>
          </ul>
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link ajax-route" data-url="/profile">Profile</a>
            </li>
          </ul>
          @elseif (Auth::user()->hasRole('librarian'))
          <ul class="nav nav-pills  flex-column">
            <li class="nav-item">
              <a class="nav-link ajax-route" data-url="/users">List of Users</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ajax-route" data-url="/users/create">Add New User</a>
            </li>
          </ul>
          <ul class="nav nav-pills flex-column">
            <li class="nav-item ">
              <a class="nav-link ajax-route" data-url="/books">List of Books</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ajax-route" data-url="/books/create">Add New Book</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ajax-route" data-url="/borrows/create">Lend Book</a>
            </li>
          </ul>
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link ajax-route" data-url="/borrows">Rentals</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ajax-route" data-url="/reservations">Reservations</a>
            </li>
          </ul>
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link ajax-route" data-url="/profile">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link ajax-route" data-url="/borrows">My Rentals</a>
            </li>
          </ul>
          @elseif (Auth::user()->hasRole('user'))
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link ajax-route" data-url="/profile">Profile</a>
            </li>
          </ul>
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link ajax-route" data-url="/userborrows">My rentals</a>
            </li>
          </ul>
          @endif

          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </li>
          </ul>
          </nav>
          @show

        <main role="main" id="contents" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
          @yield('content')
        </main>
      </div>
    </div>
    @else
    <script type="text/javascript">
      window.onload = function() {
        // similar behavior as clicking on a link
        window.location.href = '{{route('home')}}';
      }
    </script>
    @endif
    </body>
</html>
