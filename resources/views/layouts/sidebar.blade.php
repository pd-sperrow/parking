<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="{{ route('dashboard') }}">
            <div class="logo-img">
               <img width="40" height="40" src="{{ asset('img/logo.png') }}" class="header-brand-img" alt="lavalite">
            </div>
            <span class="text">&nbsp; Parking System</span>
        </a>
        {{-- <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button> --}}
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>

    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                </div>

                <div class="nav-lavel">Vehicle</div>
                <div class="nav-item has-sub {{ request()->routeIs('categories*')  ? 'open' : ''}}">
                    <a href="#"><i class="ik ik-box"></i><span>Vehicle Category</span></a>
                    <div class="submenu-content">
                        <a href="{{ route('categories.create') }}" class="menu-item  {{ request()->routeIs('categories.create') ? 'active' : '' }}">Create</a>
                        <a href="{{ route('categories.index') }}" class="menu-item  {{ request()->routeIs('categories.index') ? 'active' : '' }}">List</a>
                    </div>
                </div>
                <div class="nav-item {{ request()->routeIs('vehicles.index') ? 'active' : '' }}">
                    <a href="{{ route('vehicles.index') }}"><i class="ik ik-truck"></i><span>Vehicle List</span></a>
                </div>

                <div class="nav-lavel">Parking Section</div>
                <div class="nav-item {{ request()->routeIs('parks.create') ? 'active' : '' }}">
                    <a href="{{ route('parks.create') }}"><i class="ik ik-inbox"></i><span>New Parking</span></a>
                </div>
                <div class="nav-item {{ request()->routeIs('parks.index') ? 'active' : '' }}">
                    <a href="{{ route('parks.index') }}"><i class="ik ik-gitlab"></i><span>Currently Parked</span></a>
                </div>
                <div class="nav-item {{ request()->routeIs('parks.history') ? 'active' : '' }}">
                    <a href="{{ route('parks.history') }}"><i class="ik ik-edit"></i><span>Parking History</span></a>
                </div>

                <div class="nav-lavel">Settings</div>

                <div class="nav-item has-sub {{ request()->routeIs('slots*')  ? 'open' : ''}}">
                    <a href="#"><i class="ik ik-box"></i><span>Slots</span></a>
                    <div class="submenu-content">
                        <a href="{{ route('slots.create') }}" class="menu-item  {{ request()->routeIs('slots.create') ? 'active' : '' }}">Create</a>
                        <a href="{{ route('slots.index') }}" class="menu-item  {{ request()->routeIs('slots.index') ? 'active' : '' }}">List</a>
                    </div>
                </div>

                <div class="nav-item has-sub {{ request()->routeIs('users*')  ? 'open' : ''}}">
                    <a href="javascript:void(0)"><i class="ik ik-user"></i><span>Manage Admins </span> </a>
                    <div class="submenu-content">
                        <a href="{{ route('users.create') }}" class="menu-item {{ request()->routeIs('users.create') ? 'active' : '' }}">Create</a>
                        <a href="{{ route('users.index') }}" class="menu-item  {{ request()->routeIs('users.index') ? 'active' : '' }}">List</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
