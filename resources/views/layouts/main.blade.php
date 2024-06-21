<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Document</title>
</head>
<body>
    <div class="container">
    <div class="row">
        <!-- <nav>
            <ul>
                <li><a href="{{route('main.index')}}">Main</a></li>
                <li><a href="/posts">Posts</a></li>
                <li><a href="{{route('about.index')}}">About</a></li>
                <li><a href="{{route('contacts.index')}}">Contacts</a></li>
            </ul>
        </nav> -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="{{route('main.index')}}">main</a>
        <a class="nav-link" href="/posts">posts</a>
        <a class="nav-link" href="{{route('about.index')}}">about</a>
        <a class="nav-link" href="{{route('contacts.index')}}">contacts</a>
      </div>
    </div>
  </div>
</nav>
    </div>    
    @yield('content')
    </div>
</body>
</html>