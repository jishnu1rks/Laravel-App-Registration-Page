<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Code Green Test</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" ></script>
</head>
<body>
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <!-- <header class="masthead mb-auto">
    <div class="inner">
      <h3 class="masthead-brand"><i class="fa fa-user"></i></h3>
      <nav class="nav nav-masthead justify-content-center">
        <a class="nav-link active" href="#">Login</a>
        <a class="nav-link" href="#">Register</a>
      </nav>
    </div>
  </header> -->

  <!-- <main role="main" class="inner cover">
    <h1 class="cover-heading">Cover your page.</h1>
    <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p>
    <p class="lead">
      <a href="#" class="btn btn-lg btn-secondary">Learn more</a>
    </p>
  </main> -->

  <main role="main" class="inner cover">
  @yield('content')
  </main>

  <!-- <footer class="mastfoot mt-auto">
    <div class="inner">
      <p>Made for <a href="#">CodeGreen Test</a>, by Jishnu Krishnan.</p>
    </div>
  </footer> -->
</div>
    
</body>
</html>