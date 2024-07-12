

<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      @can('notadmin')
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>keuangan</span>
      </h6>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/keuangan*') ? 'active' : ''}}" href="/dashboard/keuangan">
            <span data-feather="file"></span>
            Data mahasiswa
          </a>
        </li>

      </ul>
    @endcan

      @can('admin') 
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>BAAK</span>
      </h6>
      <ul class="nav flex-column mb-2">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : ''}}" href="/dashboard/posts">
            <span data-feather="file-text"></span>
            Data Mahasiswa
          </a>
        </li>
      </ul>
      @endcan
   
      </div>
    </div>

    
  </nav>

