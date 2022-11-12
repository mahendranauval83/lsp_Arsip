<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="/arsip">Menu</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div disabled class="form-control form-control-dark bg-dark text-white w-100 rounded-0 border-0">
   <p>
     Archive Management App
    </p> 
  </div>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <form action="/logout" method="post">
        @csrf
        <button disabled class="px-5 py-3 text-white border-0 noselect" style="background-color: #191C1F; color: #191C1F;">Selamat datang, Anis</button>
      </form>
    </div>
  </div>
</header>