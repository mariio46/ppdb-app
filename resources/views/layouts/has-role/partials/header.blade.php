<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav ">
                <li class="nav-item d-xl-none">
                    <a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a>
                </li>
                <li class="nav-item">
                    <p class="nav-link mb-0">Halo <strong>{{ session()->get('nama') }}</strong> dan kamu adalah <strong>{{ session()->get('roles.name') }}</strong></p>
                </li>
            </ul>
        </div>
        <ul class="nav navbar-nav align-items-center ms-auto">
            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" data-bs-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">
                    <span class="avatar">
                        <img class="round" src="/app-assets/images/profile.jpg" alt="avatar" height="40" width="40">
                    </span>
                </a>
            </li>
        </ul>
    </div>
</nav>
