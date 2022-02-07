<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- rel css external file  -->
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/alert-box-style-sheet.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/loaders-style-sheet.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/bottom-bar-style-sheet.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/main-body-style-sheet.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/home-style-sheet.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/feeds-style-sheet.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/about-style-sheet.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/register-style-sheet.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/login-style-sheet.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/webkit.css">

    <link rel="icon" href="{{ URL::to('/') }}/image/logo/android-chrome-512x512.png"/>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    
    <title>Health Cares | {{ $routes }}</title>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
    @include('layouts.navbar.main-navbar')

    <div class="container mt-4">
        @yield('container')
    </div>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
      
  </body>
</html>