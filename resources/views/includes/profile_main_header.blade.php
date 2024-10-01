<div class="main-header">
    <div class="main-header-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="{{ route('home') }}" class="logo">
                {{ \App\Services\ForumServices::showLogo(150, true) }}
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <!-- Navbar Header -->
    <nav
        class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom"
    >
        <div class="container-fluid">
            <li style="list-style: none" class="nav-item">
                <h1>Всероссийский форум школьных спортивных клубов</h1>
            </li>
            <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                <li class="nav-item topbar-user dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                        <div class="avatar-sm">
                            @if(!is_null($user->avatar))
                                <img src="{{ asset('public/storage/' . $user->avatar) }}" alt="" class="avatar-img rounded-circle"/>
                            @else
                                <img src="/public/img/user-no-photo.png" alt="" class="avatar-img rounded-circle"/>
                            @endif
                        </div>
                        <span class="profile-username">
                      <span class="op-7">Здравствуйте,</span>
                      <span class="fw-bold">{{ $user->name }}</span>
                    </span>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}">Выйти </a>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>
