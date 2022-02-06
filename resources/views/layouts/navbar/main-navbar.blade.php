<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">
          <img src="{{ URL::to('/') }}/image/Health Cares-logos_transparent.png" width="250" height="60" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ $routes === "Home" ? 'active' : '' }}" aria-current="page" href="/"><i class="bi bi-house-door"></i> | Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $routes === "Feeds" ? 'active' : '' }}" href="/feeds"><i class="bi bi-newspaper"></i> | Feeds</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $routes === "About" ? 'active' : '' }}" href="/about"><i class="bi bi-info-square"></i> | About</a>
            </li>
        </ul>
        
        @auth

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ $routes === "Recipe" || $routes === "Medicine List" || $routes === "New Recipe" ? 'active' : '' }}" href="/recipe"><i class="bi bi-receipt"></i> | Recipe</a>
            </li>
        </ul>
        
        <li class="nav-item dropdown ms-auto mb-3">
            <a class="nav-link dropdown-toggle" href="/" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle"></i> | Welcome Back, {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <!-- <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-archive"></i> | Dashboard</a></li> -->
              <li><a class="dropdown-item" href="/cart"><i class="bi bi-list-task"></i> | My recipes</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                  <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item">
                       <i class="bi bi-box-arrow-right"></i> | Logout
                    </button>
                  </form>
              </li>
            </ul>
        </li>

        @else

        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link {{ $routes === "Login" || $routes === "Register" ? 'active' : '' }}" href="/login"><i class="bi bi-box-arrow-in-right"></i> | Login</a>
            </li>
        </ul>

        @endauth
      </div>
    </div>
</nav>