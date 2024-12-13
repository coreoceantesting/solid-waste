<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('admin/images/logo-sm.png') }}" alt="" height="22" />
            </span>
            <span class="logo-lg">
                <img src="{{ asset('admin/images/logo-dark.png') }}" alt="" height="17" />
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('admin/images/Panvel_Municipal_Corporation.png') }}" alt="" height="22" />
            </span>
            <span class="logo-lg">
                <img src="{{ asset('admin/images/logo.png') }}" alt="" height="50" />
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title">
                    <span data-key="t-menu">Menu</span>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('dashboard')  ? 'active' : 'collapsed' }}" href="{{ route('dashboard') }}" >
                        <i class="ri-dashboard-2-line"></i>
                        <span data-key="t-dashboards">Dashboard</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('wards.index') || request()->routeIs('area-type.index')  ? 'active' : 'collapsed' }}" href="#masters" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="masters">
                        <i class="ri-layout-3-line"></i>
                        <span data-key="t-layouts">Masters</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('wards.index') ? 'show' : '' }}" id="masters">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('wards.index') }}" class="nav-link {{ request()->routeIs('wards.index') ? 'active' : '' }}" data-key="t-horizontal">Wards</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('area-type.index') }}" class="nav-link {{ request()->routeIs('area-type.index') ? 'active' : '' }}" data-key="t-horizontal">Area Type</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('collection-type.index') }}" class="nav-link {{ request()->routeIs('area-type.index') ? 'active' : '' }}" data-key="t-horizontal">Collection Type</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('collection-transport.index') }}" class="nav-link {{ request()->routeIs('collection-transport.index') ? 'active' : '' }}" data-key="t-horizontal">Collection and Transport collection</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('census-years.index') }}" class="nav-link {{ request()->routeIs('cenus-years.index') ? 'active' : '' }}" data-key="t-horizontal">Cenus Years</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('types-of-fine-charges.index') }}" class="nav-link {{ request()->routeIs('types-of-fine-charges.index') ? 'active' : '' }}" data-key="t-horizontal">Types oF Fine Charges</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('inspection-type.index') }}" class="nav-link {{ request()->routeIs('inspection-types.index') ? 'active' : '' }}" data-key="t-horizontal">Inspection Types</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('locality-service-type.index') }}" class="nav-link {{ request()->routeIs('locality-service-type') ? 'active' : '' }}" data-key="t-horizontal">Locality Service Type</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('maintenance-type.index') }}" class="nav-link {{ request()->routeIs('maintenance-type') ? 'active' : '' }}" data-key="t-horizontal">Maintenance Type</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('pump-type.index') }}" class="nav-link {{ request()->routeIs('pump-type') ? 'active' : '' }}" data-key="t-horizontal">Pump Type</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('shift-timings.index') }}" class="nav-link {{ request()->routeIs('shift-timings') ? 'active' : '' }}" data-key="t-horizontal">Shift Timings</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('types-of-item-solds.index') }}" class="nav-link {{ request()->routeIs('types-of-item-solds') ? 'active' : '' }}" data-key="t-horizontal">Types Of Item Solds</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('vehicle-type.index') }}" class="nav-link {{ request()->routeIs('vehicle-type') ? 'active' : '' }}" data-key="t-horizontal">Vehicle Type</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('vehicles.index') }}" class="nav-link {{ request()->routeIs('vehicles') ? 'active' : '' }}" data-key="t-horizontal">Vehicles</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="{{ route('mainprefix.index') }}" class="nav-link {{ request()->routeIs('mainprefix') ? 'active' : '' }}" data-key="t-horizontal">mainprefix</a>
                            </li>
                            <li class="nav-item"> --}}
                                <a href="{{ route('prefix.index') }}" class="nav-link {{ request()->routeIs('prefix') ? 'active' : '' }}" data-key="t-horizontal">Prefix</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('prefix-details.index') }}" class="nav-link {{ request()->routeIs('prefix-details') ? 'active' : '' }}" data-key="t-horizontal">Prefix Details</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('designations.index') }}" class="nav-link {{ request()->routeIs('designations') ? 'active' : '' }}" data-key="t-horizontal">designations</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('collection-centers.index') }}" class="nav-link {{ request()->routeIs('collection-centers') ? 'active' : '' }}" data-key="t-horizontal">collection centers</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('slrm-employee-details.index') }}" class="nav-link {{ request()->routeIs('slrm-employee-details') ? 'active' : '' }}" data-key="t-horizontal">slrm employee details</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="{{ route('designations.index') }}" class="nav-link {{ request()->routeIs('designations') ? 'active' : '' }}" data-key="t-horizontal">designations</a>
                            </li> --}}
                        </ul>
                    </div>
                </li>


                @canany(['users.view', 'roles.view'])
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('users.index') || request()->routeIs('roles.index')  ? 'active' : 'collapsed' }}" href="#usermanagement" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="usermanagement">
                        <i class="bx bx-user-circle"></i>
                        <span data-key="t-layouts">User Management</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('users.index') ||  request()->routeIs('roles.index')  ? 'show' : '' }}" id="usermanagement">
                        <ul class="nav nav-sm flex-column">
                            @can('users.view')
                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}" class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}" data-key="t-horizontal">Users</a>
                                </li>
                            @endcan
                            @can('roles.view')
                                <li class="nav-item">
                                    <a href="{{ route('roles.index') }}" class="nav-link {{ request()->routeIs('roles.index') ? 'active' : '' }}" data-key="t-horizontal">Roles</a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
                @endcan

            </ul>
        </div>
    </div>

    <div class="sidebar-background"></div>
</div>


<div class="vertical-overlay"></div>
