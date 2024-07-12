<header class="navbar navbar-dark sticky-top  flex-md-nowrap p-0 shadow" style="background-color: rgba(37, 170, 211, 0.803)">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"><img src="/img/Politeknik_Sekayu.png" width="25px" alt="">  Registrasi Ulang</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
    data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="" aria-label="Search">


  <div class="dropdown text-end px-3">
    <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" id="dropdownUser1"
      data-bs-toggle="dropdown" aria-expanded="false">
      <img src="/img/profil.jpg" width="32" height="32" class="rounded-circle border border-light">
      {{ Auth()->user()->username }}
    </a>
    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
      <li><a class="dropdown-item" href="/dashboard/password">Ganti Password</a></li>
      <li>
        <hr class="dropdown-divider">
      </li>

      <li>
        <a>
          <form action="/logout" method="post">
            @csrf
            <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-in-left"></i> Logout</button>
            <div class="navbar-nav">
              <div class="nav-item text-nowrap">
                {{-- <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="nav-link px-3 bg-dark border-0"> Logout<span
                      data-feather="log-out"></span> </button>
                </form> --}}
              </div>
            </div>
          </form>
      </li>
    </ul>
    </div>
    
</header>