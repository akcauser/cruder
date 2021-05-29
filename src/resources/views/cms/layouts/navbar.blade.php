<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
  <form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
      <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
    </ul>
  </form>
  <ul class="navbar-nav navbar-right">
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <div class="d-sm-none d-lg-inline-block">Options</div>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-title">Cruder</div>
        <a href="{{ route('cruder.builder') }}" class="dropdown-item has-icon">
          <i class="fas fa-bolt"></i> Builder
        </a>
        <a href="{{ route('cms.index') }}" class="dropdown-item has-icon">
          <i class="fas fa-bolt"></i> CMS
        </a>
        <a href="#swagger" class="dropdown-item has-icon">
          <i class="fas fa-bolt"></i> Swagger
        </a>
      </div>
  </ul>
</nav>