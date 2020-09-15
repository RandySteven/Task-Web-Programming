<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="600">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="icon" href="{{ asset('images/mail.png') }}">
    @yield('style')
</head>
<body class="bg-dark text-white">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.html"><img src="{{ asset('images/large-removebg-preview-removebg-preview.png') }}" width="150" height="70" alt=""></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('post.index') }}">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('post.create') }}">CREATE</a>
            </li>
          </ul>

          @guest
          <li class="nav-item dropdown left-panel float-right">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Sign in/Sign up
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="{{ route('register') }}">Register</a>
              <a class="dropdown-item" href="{{ route('login') }}">Login</a>
            </div>
          </li>
          @else
          <li class="nav-item dropdown left-panel">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{ Auth::user()->gravatar() }}" class="rounded-circle" width="30" height="30" alt="">
                {{ Auth::user()->name }}
              </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="btn btn-link">logout</button>
                </form>
                <a href="{{ route('user', Auth::user()->id) }}" class="dropdown-item">See profile</a>
                @if (Auth::user()->hasRole('admin'))
                    <a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a>
                @endif
            </div>
          </li>
          @endguest
        </div>
    </nav>

       @yield('content')

    <!-- footer -->
  <footer class="text-dark">
    <div class="container text-center text-black" style="background-color: lightgrey">
        &copy; Randy Steven 2020
        <p>
            Menyediakan tentang berita dan artikel terkini tentang apa yang terjadi di dunia.
            <br>
            Luaskan ilmu yang bermanfaat.
        </p>
        <p>
            <a href="https://www.facebook.com/"><img src="{{ asset('images/facebook.png') }}" class="navbar-toggler-icon rounded-circle"  alt=""></a>
            <a href="https://github.com/"><img src="{{ asset('images/github.png') }}" class="navbar-toggler-icon rounded-circle"  alt=""></a>
            <a href="https://www.instagram.com/"><img src="{{ asset('images/logo.png') }}" class="navbar-toggler-icon rounded-circle"  alt=""></a>
            <a href="https://www.youtube.com/"><img src="{{ asset('images/youtube.png') }}" class="navbar-toggler-icon rounded-circle"  alt=""></a>
            <a href="#"><img src="{{ asset('images/twitter.png') }}" class="navbar-toggler-icon rounded-circle"  alt=""></a>
        </p>
        <p>
            Menambah ilmu dengan berita yang jujur.
        </p>
        <!-- <button class="btn btn-outline-secondary" onclick="darkmode()">Darkmode</button> -->
    </div>
  </footer>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
