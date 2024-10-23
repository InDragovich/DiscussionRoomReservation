@php
  use App\Enums\UserRole;
@endphp
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
    <div class="sidebar-brand-icon rotate-n-15">
      <!-- <i class="fas fa-laugh-wink"></i> -->
    </div>
    <div class="d-flex px-2">
      <div class="sidebar-brand-icon mx-1">
        <i class="fas fa-rocket"></i>
      </div>
      <div class="sidebar-brand-text my-auto">MeetSpace
      </div>
    </div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0" />
  <li class="nav-item">
    {{-- @auth --}}
    <a class="nav-link collapsed" href="{{ url('rooms') }}">
      <i class="fas fa-home"></i>
      <span>Kelola Ruangan</span>
    </a>
    {{-- @endauth --}}
  </li>

  @auth
  <li class="nav-item">
    <a class="nav-link collapsed" href="">
      <i class="fas fa-history"></i>
      <span>Riwayat Reservasi</span>
    </a>
  </li>
  @else
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('login') }}">
      <i class="fas fa-history"></i>
      <span>Riwayat Reservasi</span>
    </a>
  </li>
  @endauth

  @auth
  <li class="nav-item">
    <a class="nav-link collapsed" href="">
      <i class="fas fa-fw fa-user"></i>
      <span>Daftar Pengguna</span>
    </a>
  </li>
  @endauth
  <li class="nav-item">
    <a class="nav-link collapsed" href="">
      <i class="fas fa-book"></i>
      <span>Daftar Reservasi</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block" />

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>
<!-- End of Sidebar -->
