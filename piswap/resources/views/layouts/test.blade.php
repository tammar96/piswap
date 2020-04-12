<!-- Stored in resources/views/layouts/app.blade.php -->
<html lang="en" class="gr__getbootstrap_com">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Projekt Kniznicny System">
    <meta name="author" content="xtamas01, xormos00, xlakat01, xkuzel06">
  <!-- Bootstrap core CSS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  <script src="./bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <link href="/css/template.css" rel="stylesheet">
  <title>PIS - @yield('title')</title>
  </head>

  <body>
  <div class="container-fluid" style="">
    <div class="row">
        @section('sidebar')
        <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-slack sidebar" style="">
        <div style="">
          <div style="">
            <img src="./img/logo_sh.png" style="width:100%;">
          </div>
        </div>
        <ul class="nav nav-pills  flex-column">
          <li class="nav-item ">
            <a class="nav-link" href="/search">Search</a>
          </li>
        </ul>
        @if(auth()->check())
        <ul class="nav nav-pills  flex-column">
          <li class="nav-item ">
            <a class="nav-link" href="/books">List of Books</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/users">List of Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/books/create">Add New Book</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/borrows/create">Borrow Book</a>
          </li>
        </ul>
        <ul class="nav nav-pills flex-column">
          <li class="nav-item">
            <a class="nav-link" href="/rentals">My Rentals</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/profile">Profile</a>
          </li>
        </ul>
        @else
        <p>Je to v pici</p>
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


      <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
        @yield('content')
      </main>
    </div>
  </div>
  </body>
</html>