<div class="nav-left-sidebar sidebar-dark">
  <div class="menu-list">
      <nav class="navbar navbar-expand-lg navbar-light">
          <a class="d-xl-none d-lg-none" href="">Dashboard</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav flex-column">
                  <li class="nav-divider">
                      Menu
                  </li>
                  @if(Request::is('scoop2019/painel/dashboard'))
                  <li class="nav-item">
                      <a class="nav-link active" href=""><i
                              class="fas fa-fw fa-home"></i>Dashboard <span
                              class="badge badge-success">6</span></a>
                  </li>
                  @else
                  <li class="nav-item">
                      <a class="nav-link" href=""><i
                              class="fas fa-fw fa-home"></i>Dashboard <span
                              class="badge badge-success">6</span></a>
                  </li>
                  @endif

                  @if(Request::is('painel/categorias') || Request::is('painel/categorias/*'))
                  <li class="nav-item">
                      <a class="nav-link active" href="{{ route('categorias.index') }}"><i
                              class="fa fa-fw fa-rocket"></i>Categorias</a>
                  </li>
                  @else
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('categorias.index') }}"><i
                              class="fa fa-fw fa-rocket"></i>Categorias</a>
                  </li>
                  @endif

                  @if(Request::is('painel/generos') || Request::is('painel/generos/*'))
                  <li class="nav-item">
                      <a class="nav-link active" href="{{ route('generos.index') }}"><i class="fa fa-fw fa-user"></i>Gêneros</a>
                  </li>
                  @else
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('generos.index') }}"><i class="fa fa-fw fa-user"></i>Gêneros</a>
                  </li>
                  @endif

                  @if(Request::is('painel/obras') || Request::is('painel/obras/*'))
                  <li class="nav-item">
                      <a class="nav-link active" href="{{ route('obras.index') }}"><i
                              class="fas fa-fw fa-chart-pie"></i>Obras</a>
                  </li>
                  @else
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('obras.index') }}"><i
                              class="fas fa-fw fa-chart-pie"></i>Obras</a>
                  </li>
                  @endif
              </ul>
          </div>
      </nav>
  </div>
</div>