<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Service Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>

    .sidebar {
      height: 100vh;
      position: sticky;
      top: 0;
      overflow-y: auto;
      padding-top: 1rem;
    }
    .top-nav {
      position: sticky;
      top: 0;
      z-index: 1020;
    }
    .product-card {
      margin-bottom: 1.5rem;
    }
    a{
        text-decoration: none;
    }
    a li:hover{
        background: rgb(243, 242, 242);
    }
  </style>
</head>
<body>

  <!-- Top Navigation Ber -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
        <a class="navbar-brand" href="/">
            {{-- <img src="assets/img/navbar-logo.svg" alt="..." /> --}}
            <h2 class="text-warning">MULTIMEDIA IT</h2>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{route('service.page')}}">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="/#portfolio">Portfolio</a></li>
                <li class="nav-item"><a class="nav-link" href="/#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="/#team">Team</a></li>
                <li class="nav-item"><a class="nav-link" href="/#contact">Contact</a></li>
            </ul>
        </div>
    </div>
  </nav>

  <div class="container-fluid mt-3">
    <div class="row">
      <!-- Left Sideber: SErvice Category -->
      <aside class="col-md-3 sidebar bg-light">
        <h5 class=" mb-4">Product Category</h5>
        <ul class="list-group">
            <a href="{{route('service.page')}}"><li class="list-group-item">All Service</li></a>
         @foreach ($categories as $category)
         <a href="{{route('singlecategory.page',$category->slug)}}"><li class="list-group-item">{{$category->name}}</li></a>
         @endforeach
        </ul>
      </aside>

      <!-- Rigth SIde: Right Card -->
      <main class="col-md-9">
        <div class="row">
          <!-- Service Card-->
            @yield('service')
        </div>
      </main>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
