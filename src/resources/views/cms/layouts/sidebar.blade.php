<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{route('cms.index')}}">Cruder</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">CR</a>
    </div>
    <ul class="sidebar-menu">
      <li class="nav-item dropdown">
          <a href="{{route('cms.index')}}" class="nav-link">
              <i class="fas fa-square"></i>
              <span>Home</span>
          </a>
      </li>
      <li class="menu-header">Menu</li>
      @include('cms.layouts.menu')
    </ul>

    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
      <a href="#" class="btn btn-primary btn-lg btn-block btn-icon-split">
        <i class="fas fa-rocket"></i> Documentation
      </a>
    </div>
  </aside>
</div>