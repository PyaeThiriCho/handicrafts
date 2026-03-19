<ul class="navbar-nav sidebar sidebar-dark accordion animate__animated animate__fadeInLeft" 
    id="accordionSidebar" 
    style="background: linear-gradient(180deg, #A52A2A 10%, #630000 100%);">

    <a class="sidebar-brand d-flex align-items-center justify-content-center py-4" href="{{ route('table') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-palette"></i>
        </div>
        <div class="sidebar-brand-text mx-3 text-uppercase font-weight-bold">Handicraft Admin</div>
    </a>

    <hr class="sidebar-divider my-0" style="border-top: 1px solid rgba(255,255,255,0.15);">

    <li class="nav-item {{ Request::is('table*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('table') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider" style="border-top: 1px solid rgba(255,255,255,0.15);">

    <div class="sidebar-heading" style="color: rgba(255,255,255,0.6);">Security Control</div>

    <li class="nav-item {{ Request::is('users*') || Request::is('roles*') || Request::is('permissions*') ? 'active' : '' }}">
        <a class="nav-link {{ Request::is('users*') || Request::is('roles*') || Request::is('permissions*') ? '' : 'collapsed' }}" 
           href="#" data-toggle="collapse" data-target="#collapseSecurity"
           aria-expanded="{{ Request::is('users*') || Request::is('roles*') || Request::is('permissions*') ? 'true' : 'false' }}" 
           aria-controls="collapseSecurity">
            <i class="fas fa-fw fa-user-shield" style="color: #D4AF37;"></i>
            <span>User Management</span>
        </a>
        <div id="collapseSecurity" class="collapse {{ Request::is('users*') || Request::is('roles*') || Request::is('permissions*') ? 'show' : '' }}" 
             aria-labelledby="headingSecurity" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded shadow">
                <a class="collapse-item {{ Request::is('users*') ? 'active' : '' }}" href="{{ route('users.index') }}">
                    <i class="fas fa-users fa-sm fa-fw mr-2"></i> Users List
                </a>
                <a class="collapse-item {{ Request::is('roles*') ? 'active' : '' }}" href="{{ route('roles.index') }}">
                    <i class="fas fa-shield-alt fa-sm fa-fw mr-2"></i> Role Manager
                </a>
                <a class="collapse-item {{ Request::is('permissions*') ? 'active' : '' }}" href="{{ route('permissions.index') }}">
                    <i class="fas fa-key fa-sm fa-fw mr-2"></i> Permissions
                </a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider" style="border-top: 1px solid rgba(255,255,255,0.15);">

    <div class="sidebar-heading" style="color: rgba(255,255,255,0.6);">Inventory Management</div>

    <li class="nav-item {{ Request::is('categories*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('categories.index') }}">
            <i class="fas fa-fw fa-layer-group"></i>
            <span>Categories</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('products*') ? 'active' : '' }}">
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

    <div class="sidebar-heading" style="color: rgba(255,255,255,0.6);">System</div>

    <li class="nav-item">
        <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-fw fa-sign-out-alt text-warning"></i>
            <span class="text-white">Logout</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>

    <hr class="sidebar-divider d-none d-md-block" style="border-top: 1px solid rgba(255,255,255,0.15);">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle" style="background-color: rgba(255,255,255,0.2);"></button>
    </div>
</ul>