<ul class="navbar-nav sidebar sidebar-dark accordion animate__animated animate__fadeInLeft" 
    id="accordionSidebar" 
    style="background: linear-gradient(180deg, #A52A2A 10%, #630000 100%);">

    <a class="sidebar-brand d-flex align-items-center justify-content-center py-4" href="index.html">
        <div class="sidebar-brand-icon">
            <i class="fas fa-palette"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Handicraft Admin</div>
    </a>

    <hr class="sidebar-divider my-0" style="border-top: 1px solid rgba(255,255,255,0.15);">

    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider" style="border-top: 1px solid rgba(255,255,255,0.15);">

    <div class="sidebar-heading" style="color: rgba(255,255,255,0.6);">Inventory Management</div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('categories.index') }}">
            <i class="fas fa-fw fa-layer-group"></i>
            <span>Categories</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('products.index') }}">
            <i class="fas fa-fw fa-box"></i>
            <span>Products</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-pen-nib"></i>
            <span>Authors / Artisans</span>
        </a>
    </li>

    <hr class="sidebar-divider" style="border-top: 1px solid rgba(255,255,255,0.15);">

    <div class="sidebar-heading" style="color: rgba(255,255,255,0.6);">Sales</div>

    <li class="nav-item">
        <a class="nav-link" href="orders.html">
            <i class="fas fa-fw fa-box-open"></i>
            <span>Orders</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block" style="border-top: 1px solid rgba(255,255,255,0.15);">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle" style="background-color: rgba(255,255,255,0.2);"></button>
    </div>

</ul>