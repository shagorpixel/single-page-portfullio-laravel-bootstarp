<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sticky Sidebar & Navigation Product Page</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Sticky Top Navigation */
    .sticky-top {
      position: sticky;
      top: 0;
      z-index: 1020;
    }

    /* Make the left sidebar fixed on scroll */
    .fixed-sidebar {
      position: -webkit-sticky; /* For Safari */
      position: sticky;
      top: 70px; /* Adjust according to the height of your navbar */
      height: calc(100vh - 70px); /* Full height minus navbar height */
      overflow-y: auto;
    }
  </style>
</head>
<body>

  <!-- Sticky Top Navigation Menu -->
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

  <!-- Main Container for the Sidebar and Products -->
  <div class="container mt-4">
    <div class="row">
      <!-- Left Sidebar (Categories) with fixed position -->
      <div class="col-md-3">
        <div class="fixed-sidebar">
          <h5>Categories</h5>
          <ul class="list-group">
            <li class="list-group-item">Category 1</li>
            <li class="list-group-item">Category 2</li>
            <li class="list-group-item">Category 3</li>
            <li class="list-group-item">Category 4</li>
            <li class="list-group-item">Category 5</li>
            <li class="list-group-item">Category 6</li>
            <li class="list-group-item">Category 7</li>
          </ul>
        </div>
      </div>

      <!-- Right Sidebar (Products) -->
      <div class="col-md-9">
        <h5>Products</h5>
        <div class="row">
          <!-- Product Card 1 -->
          <div class="col-md-4">
            <div class="card mb-4">
              <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product 1">
              <div class="card-body">
                <h6 class="card-title">Product 1</h6>
                <p class="card-text">$29.99</p>
                <a href="#" class="btn btn-primary">Buy Now</a>
              </div>
            </div>
          </div>

          <!-- Product Card 2 -->
          <div class="col-md-4">
            <div class="card mb-4">
              <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product 2">
              <div class="card-body">
                <h6 class="card-title">Product 2</h6>
                <p class="card-text">$39.99</p>
                <a href="#" class="btn btn-primary">Buy Now</a>
              </div>
            </div>
          </div>

          <!-- Product Card 3 -->
          <div class="col-md-4">
            <div class="card mb-4">
              <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product 3">
              <div class="card-body">
                <h6 class="card-title">Product 3</h6>
                <p class="card-text">$49.99</p>
                <a href="#" class="btn btn-primary">Buy Now</a>
              </div>
            </div>
          </div>

          <!-- Product Card 4 -->
          <div class="col-md-4">
            <div class="card mb-4">
              <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product 4">
              <div class="card-body">
                <h6 class="card-title">Product 4</h6>
                <p class="card-text">$59.99</p>
                <a href="#" class="btn btn-primary">Buy Now</a>
              </div>
            </div>
          </div>

          <!-- Product Card 5 -->
          <div class="col-md-4">
            <div class="card mb-4">
              <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product 5">
              <div class="card-body">
                <h6 class="card-title">Product 5</h6>
                <p class="card-text">$69.99</p>
                <a href="#" class="btn btn-primary">Buy Now</a>
              </div>
            </div>
          </div>

          <!-- Product Card 6 -->
          <div class="col-md-4">
            <div class="card mb-4">
              <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product 6">
              <div class="card-body">
                <h6 class="card-title">Product 6</h6>
                <p class="card-text">$79.99</p>
                <a href="#" class="btn btn-primary">Buy Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
