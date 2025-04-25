<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3"> GDF </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="fas fa-home"></i>
        <span>Home</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('products.index') }}">
        <i class="fas fa-file-invoice"></i>
        <span>Facture</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('clients.index') }}">
          <i class="fas fa-users"></i>
          <span>Clients</span></a>
      </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('categories_produits.index') }}">
          <i class="fas fa-tags"></i>
          <span>Categirie</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('produits.index') }}">
          <i class="fas fa-box-open"></i>
          <span>Produits</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('ventes.index') }}">
          <i class="fas fa-shopping-cart"></i>
          <span>Ventes</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('ligne_ventes.index') }}">
          <i class="fas fa-list-ul"></i>
          <span>Ligne Ventes</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="/profile">
        <i class="fas fa-user"></i>
        <span>Profile</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
