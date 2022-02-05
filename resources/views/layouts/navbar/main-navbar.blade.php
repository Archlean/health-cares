<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="height: 80px">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">
          <img src="{{ URL::to('/') }}/image/Health Cares-logos_transparent.png" width="180" height="60" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ $routes === "Home" ? 'active' : '' }}" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $routes === "Feeds" ? 'active' : '' }}" href="/feeds">Feeds</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $routes === "About" ? 'active' : '' }}" href="/about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $routes === "Register" ? 'active' : '' }}" href="/register" style="right: 0; position:absolute; margin-right: 70px">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $routes === "Login" ? 'active' : '' }}" href="/login" style="right: 0; position:absolute; margin-right: 10px">Login</a>
            </li>
        </ul>
      </div>
    </div>
</nav>