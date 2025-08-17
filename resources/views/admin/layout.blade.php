<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Admin Panel')</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

  <style>
    body {
      background-color: #f8f9fa;
    }

    /* Sidebar base style */
    .sidebar {
      background-color: #2c3e50;
      color: #fff;
    }

    .sidebar a {
      color: #ffffff;
      text-decoration: none;
      padding: 0.75rem 1rem;
      display: flex;
      align-items: center;
      border-radius: 0.3rem;
      transition: background-color 0.2s ease, color 0.2s ease;
    }

    .sidebar a i {
      font-size: 1.2rem;
    }

    .sidebar a span {
      margin-left: 0.5rem;
    }

    .sidebar a:hover {
      background-color: #34495e;
    }

    .sidebar a.active {
      background-color: #0d6efd;
      font-weight: 600;
    }

    /* Desktop sidebar */
    @media (min-width: 992px) {
      .sidebar {
        height: 100vh;       /* Full tinggi layar */
        position: sticky;
        top: 0;
        flex-shrink: 0;
        width: 250px;
      }
    }

    main.content {
      padding: 2rem;
      flex-grow: 1;
    }
  </style>
  @yield('styles')
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-light bg-white shadow-sm px-3">
    <div class="container-fluid">
      <!-- Button for mobile -->
      <button class="btn btn-outline-secondary d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMobile">
        ☰
      </button>
      <span class="navbar-text ms-2">
        Selamat datang, <b>{{ Auth::user()->name }}</b>
      </span>
      <form method="POST" action="{{ route('logout') }}" class="ms-auto">
        @csrf
        <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
      </form>
    </div>
  </nav>

  <div class="d-flex">
    <!-- Sidebar Mobile -->
    <div class="offcanvas offcanvas-start sidebar text-white d-lg-none" tabindex="-1" id="sidebarMobile">
      <div class="offcanvas-header">
        <h5 class="text-white m-0">Admin Panel</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
      </div>
      <div class="offcanvas-body d-flex flex-column p-3">
        <a href="{{ route('admin.index') }}" class="{{ request()->routeIs('admin.index') ? 'active' : '' }}">
          <i class="bi bi-speedometer2"></i><span>Dashboard</span>
        </a>
        <a href="{{ route('admin.user-role.index') }}" class="{{ request()->routeIs('admin.user-role.*') ? 'active' : '' }}">
          <i class="bi bi-people"></i><span>Account Manager</span>
        </a>
        <a href="{{ route('admin.kartu-keluarga.index') }}" class="{{ request()->routeIs('admin.kartu-keluarga.*') ? 'active' : '' }}">
          <i class="bi bi-card-list"></i><span>Kartu Keluarga</span>
        </a>
        <a href="{{ route('admin.agenda.index') }}" class="{{ request()->routeIs('admin.agenda.*') ? 'active' : '' }}">
          <i class="bi bi-calendar-event"></i><span>Agenda</span>
        </a>
        <a href="{{ route('admin.berita.index') }}" class="{{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">
          <i class="bi bi-newspaper"></i><span>Berita</span>
        </a>
        <a href="{{ route('admin.feedback.index') }}" class="{{ request()->routeIs('admin.feedback.*') ? 'active' : '' }}">
          <i class="bi bi-chat-left-text"></i><span>Feedback</span>
        </a>
        <a href="{{ route('admin.profile.index') }}" class="{{ request()->routeIs('admin.profile.*') ? 'active' : '' }}">
          <i class="bi bi-globe"></i><span>Web Profile</span>
        </a>
      </div>
    </div>

    <!-- Sidebar Desktop -->
    <div class="sidebar d-none d-lg-flex flex-column p-3">
      <a href="{{ route('admin.index') }}" class="{{ request()->routeIs('admin.index') ? 'active' : '' }}">
        <i class="bi bi-speedometer2"></i><span>Dashboard</span>
      </a>
      <a href="{{ route('admin.user-role.index') }}" class="{{ request()->routeIs('admin.user-role.*') ? 'active' : '' }}">
        <i class="bi bi-people"></i><span>Account Manager</span>
      </a>
      <a href="{{ route('admin.kartu-keluarga.index') }}" class="{{ request()->routeIs('admin.kartu-keluarga.*') ? 'active' : '' }}">
        <i class="bi bi-card-list"></i><span>Kartu Keluarga</span>
      </a>
      <a href="{{ route('admin.agenda.index') }}" class="{{ request()->routeIs('admin.agenda.*') ? 'active' : '' }}">
        <i class="bi bi-calendar-event"></i><span>Agenda</span>
      </a>
      <a href="{{ route('admin.berita.index') }}" class="{{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">
        <i class="bi bi-newspaper"></i><span>Berita</span>
      </a>
      <a href="{{ route('admin.feedback.index') }}" class="{{ request()->routeIs('admin.feedback.*') ? 'active' : '' }}">
        <i class="bi bi-chat-left-text"></i><span>Feedback</span>
      </a>
      <a href="{{ route('admin.profile.index') }}" class="{{ request()->routeIs('admin.profile.*') ? 'active' : '' }}">
        <i class="bi bi-globe"></i><span>Web Profile</span>
      </a>
    </div>

    <!-- Content -->
    <main class="content">
      @yield('content')
    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  @stack('scripts')
</body>
</html>
