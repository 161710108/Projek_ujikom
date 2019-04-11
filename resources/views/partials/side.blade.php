 <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="/img/user.png" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">{{ Auth::user()->name }} </p>
                  <div>
                    <small class="designation text-muted">Admin</small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
             <!--  <button class="btn btn-success btn-block">New Project
                <i class="mdi mdi-plus"></i>
              </button> -->
            </div>
          </li>
           @if (Auth::check())
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">
              <i class="menu-icon mdi mdi-home-account"></i>
              <span class="menu-title"><b>Dashboard</b></span>
            </a>
          </li>
          @role('admin')
          <li class="nav-item">
            <a class="nav-link" href="{{ route('authors.index') }}">
              <i class="menu-icon mdi mdi-account"></i>
              <span class="menu-title"><b>Penulis</b></span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('books.index') }}">
              <i class="menu-icon mdi mdi-book"></i>
              <span class="menu-title"><b>Buku</b></span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('members.index') }}">
              <i class="menu-icon mdi mdi-clipboard-account"></i>
              <span class="menu-title"><b>Member</b></span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('statistics.index') }}">
              <i class="menu-icon mdi mdi-file-account"></i>
              <span class="menu-title"><b>Data Peminjaman</b></span>
            </a>
          </li>
           @endrole
           @if (auth()->check())
            <li class="nav-item {{ Request::is('settings/profile2') ? 'active ' : '' }}">
              <a class="nav-link" href="{{ url('/settings/profile2') }}">
              <i class="menu-icon mdi mdi-account-alert"></i>
              <span class="menu-title"><b>Profil</b></span>
            </a>
            </li>  
            @endif
            @endif
         <!--  <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="menu-icon mdi mdi-restart"></i>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/samples/login.html"> Login </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/samples/register.html"> Register </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/samples/error-404.html"> 404 </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/samples/error-500.html"> 500 </a>
                </li>
              </ul>
            </div>
          </li> -->
        </ul>
      </nav>