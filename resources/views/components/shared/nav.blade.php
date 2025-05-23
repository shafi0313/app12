<div class="app-sidebar">
    <!-- Sidebar Logo -->
    <div class="logo-box">
        <a href="{{ route('admin.dashboard') }}" class="logo-dark">
            <img src="{{ getAppLogo('dark') }}" class="logo-sm" alt="{{ config('app.name') }}">
            <img src="{{ getAppLogo('dark') }}" class="logo-lg" alt="{{ config('app.name') }}">
        </a>

        <a href="{{ route('admin.dashboard') }}" class="logo-light">
            <img src="{{ getAppLogo('light') }}" class="logo-sm" alt="{{ config('app.name') }}">
            <img src="{{ getAppLogo('light') }}" class="logo-lg" alt="{{ config('app.name') }}">
        </a>
    </div>

    <div class="scrollbar" data-simplebar>
        <ul class="navbar-nav" id="navbar-nav">
            <li class="menu-title">Menu...</li>

            {{-- :active="['route1','route2']" --}}
            <x-shared.nav-item route="admin.dashboard" icon="solar:widget-2-outline" text="Dashboard" />

            @php
                $submenus = [
                    ['title' => 'User', 'route' => 'admin.users.index'],
                ];
            @endphp

            <x-shared.nav-dropdown icon="solar:user-circle-outline" id="admin" :submenu="$submenus" title="Admin" />


            {{-- <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebarAuthentication" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarAuthentication">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:user-circle-outline"></iconify-icon>
                    </span>
                    <span class="nav-text"> Authentication </span>
                </a>
                <div class="collapse" id="sidebarAuthentication">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="auth-signin.html">Sign In</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="auth-signup.html">Sign Up</a>
                        </li>
                    </ul>
                </div>
            </li> --}}

            {{-- <li class="nav-item">
                <a class="nav-link menu-arrow" href="#sidebarMultiLevelDemo" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="sidebarMultiLevelDemo">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:share-circle-outline"></iconify-icon>
                    </span>
                    <span class="nav-text"> Menu Item </span>
                </a>
                <div class="collapse" id="sidebarMultiLevelDemo">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="javascript:void(0);">Menu Item 1</a>
                        </li>
                        <li class="sub-nav-item">
                            <a class="sub-nav-link  menu-arrow" href="#sidebarItemDemoSubItem" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="sidebarItemDemoSubItem">
                                <span> Menu Item 2 </span>
                            </a>
                            <div class="collapse" id="sidebarItemDemoSubItem">
                                <ul class="nav sub-navbar-nav">
                                    <li class="sub-nav-item">
                                        <a class="sub-nav-link" href="javascript:void(0);">Menu Sub
                                            item</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li> --}}

            {{-- <li class="nav-item">
                <a class="nav-link disabled" href="javascript:void(0);">
                    <span class="nav-icon">
                        <iconify-icon icon="solar:library-outline"></iconify-icon>
                    </span>
                    <span class="nav-text"> Disable Item </span>
                </a>
            </li> --}}
        </ul>
    </div>
</div>
