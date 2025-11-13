<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="{{ route('dashboard') }}">{{ config('app.name') }}</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto">
        @auth
          <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">Productos</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('stock-movements.index') }}">Movimientos</a></li>
        @endauth
      </ul>
      <ul class="navbar-nav ms-auto">
        @guest
          <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Registro</a></li>
        @else
          <li class="nav-item"><span class="nav-link">Hola, {{ auth()->user()->name }}</span></li>
          <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
              @csrf
              <button class="btn btn-link nav-link">Cerrar sesión</button>
            </form>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
