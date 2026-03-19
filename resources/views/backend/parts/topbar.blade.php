<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow animate__animated animate__fadeInDown" style="border-bottom: 2px solid #A52A2A;">

    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3" style="color: #A52A2A;">
        <i class="fa fa-bars"></i>
    </button>

    <form action="{{ route('products.index') }}" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" name="search" class="form-control bg-light border-0 small" 
                   placeholder="Find handicrafts..." aria-label="Search" 
                   value="{{ request('search') }}" style="border: 1px solid #eee !important;">
            <div class="input-group-append">
                <button class="btn shadow-sm" style="background-color: #A52A2A; color: white;" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown">
                <i class="fas fa-bell fa-fw" style="color: #630000;"></i>
                <span class="badge badge-counter" style="background-color: #A52A2A; color: white;">3+</span>
            </a>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
                <span class="mr-2 d-none d-lg-inline text-gray-800 small font-weight-bold">Pyae | Htet | Su</span>
                <img class="img-profile rounded-circle border" 
                     src="{{ asset('backend_assets/img/undraw_profile.svg') }}"
                     style="border-color: #A52A2A !important; width: 30px; height: 30px;">
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in">
                <a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-danger"></i> Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-danger"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>