<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('arsip*') ? 'active' : ''}}" href="/arsip">
          <span data-feather="star" class="align-text-bottom"></span>
          Arsip
        </a>
      </li>
    </ul>

    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('about') ? 'active' : ''}}" aria-current="page" href="/about">
          <span data-feather="info" class="align-text-bottom"></span>
          About
        </a>
      </li>
    </ul>
  </div>
</nav>