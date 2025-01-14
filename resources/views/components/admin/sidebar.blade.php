<div class="app-menu navbar-menu">
    <!-- uuuLOGO -->
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
                    <div class="collapse menu-dropdown {{ request()->routeIs('wards.index') || request()->routeIs('area-type.index') || request()->routeIs('collection-type.index') || request()->routeIs('collection-transport.index') || request()->routeIs('census-years.index') || request()->routeIs('types-of-fine-charges.index') || request()->routeIs('inspection-type.index') || request()->routeIs('locality-service-type.index') || request()->routeIs('maintenance-type.index') || request()->routeIs('pump-type.index') || request()->routeIs('shift-timings.index') || request()->routeIs('types-of-item-solds.index') || request()->routeIs('vehicle-type.index') || request()->routeIs('vehicles.index') || request()->routeIs('prefix.index') || request()->routeIs('prefix-details.index') || request()->routeIs('designations.index') || request()->routeIs('collection-centers.index') || request()->routeIs('slrm-employee-details.index') || request()->routeIs('population.index') || request()->routeIs('form17.index') ? 'show' : '' }}" id="masters">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('wards.index') }}" class="nav-link {{ request()->routeIs('wards.index') ? 'active' : '' }}" data-key="t-horizontal">Wards</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('area-type.index') }}" class="nav-link {{ request()->routeIs('area-type.index') ? 'active' : '' }}" data-key="t-horizontal">Area Type</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('collection-type.index') }}" class="nav-link {{ request()->routeIs('collection-type.index') ? 'active' : '' }}" data-key="t-horizontal">Collection Type</a>
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
                            <li class="nav-item">
                                <a href="{{ route('population.index') }}" class="nav-link {{ request()->routeIs('population') ? 'active' : '' }}" data-key="t-horizontal">population</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('form17.index') }}" class="nav-link {{ request()->routeIs('form17') ? 'active' : '' }}" data-key="t-horizontal">form17</a>
                            </li>
                             {{-- <li class="nav-item">
                                <a href="{{ route('designations.index') }}" class="nav-link {{ request()->routeIs('designations') ? 'active' : '' }}" data-key="t-horizontal">designations</a>
                            </li> --}}
                            {{-- <li class="nav-item">
                                <a href="{{ route('vehicle-scheduling-information.index') }}" class="nav-link {{ request()->routeIs('vehicle-scheduling-information') ? 'active' : '' }}" data-key="t-horizontal">Vehicle Scheduling Information</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('contract-mapping.index') }}" class="nav-link {{ request()->routeIs('contract-mapping') ? 'active' : '' }}" data-key="t-horizontal">Contract Mapping</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="{{ route('contract-mapping.index') }}" class="nav-link {{ request()->routeIs('contract-mapping') ? 'active' : '' }}" data-key="t-horizontal">Contract Mapping</a>
                            </li> --}}
                            {{-- <li class="nav-item">
                                <a href="{{ route('waste-details.index') }}" class="nav-link {{ request()->routeIs('waste-details') ? 'active' : '' }}" data-key="t-horizontal">Waste Details</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('trip-sheet.index') }}" class="nav-link {{ request()->routeIs('trip-sheet') ? 'active' : '' }}" data-key="t-horizontal">Trip Sheet</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('vehicle-target.index') }}" class="nav-link {{ request()->routeIs('vehicle-target') ? 'active' : '' }}" data-key="t-horizontal">Vehicle Target</a>
                            </li> --}}
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('vehicle-scheduling-information.index') || request()->routeIs('contract-mapping.index') || request()->routeIs('waste-details.index') || request()->routeIs('vehicle-target.index') ? 'active' : 'collapsed' }}" href="#transactions" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="transactions">
                        <i class="ri-exchange-line"></i>
                        <span data-key="t-transactions">Transactions</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('vehicle-scheduling-information.index') || request()->routeIs('contract-mapping.index') || request()->routeIs('waste-details.index') || request()->routeIs('vehicle-target.index') ? 'show' : '' }}" id="transactions">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('vehicle-scheduling-information.index') }}" class="nav-link {{ request()->routeIs('vehicle-scheduling-information.index') ? 'active' : '' }}" data-key="t-transaction-list">Vehicle Information Scheduling</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('contract-mapping.index') }}" class="nav-link {{ request()->routeIs('contract-mapping.index') ? 'active' : '' }}" data-key="t-transaction-details">Contract Mapping</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('waste-details.index') }}" class="nav-link {{ request()->routeIs('waste-details.index') ? 'active' : '' }}" data-key="t-transaction-type">Waste Details</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('trip-sheet.index') }}" class="nav-link {{ request()->routeIs('trip-sheet.index') ? 'active' : '' }}" data-key="t-transaction-status">Trip Sheet</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('vehicle-target.index') }}" class="nav-link {{ request()->routeIs('vehicle-target.index') ? 'active' : '' }}" data-key="t-transaction-category">Vehicle Target</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('report.collection-scheduling-report') || request()->routeIs('report.collection-scheduling-report') || request()->routeIs('report.collection-scheduling-report') || request()->routeIs('report.collection-scheduling-report') ? 'active' : 'collapsed' }}" href="#reports" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="reports">
                        <i class="ri-file-line"></i>
                        <span data-key="t-reports">Reports</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('report.collection-scheduling-report') || request()->routeIs('report.collection-scheduling-report') || request()->routeIs('report.collection-scheduling-report') || request()->routeIs('report.collection-scheduling-report') ? 'show' : '' }}" id="reports">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('report.collection-scheduling-report') }}" class="nav-link {{ request()->routeIs('report.collection-scheduling-report') ? 'active' : '' }}" data-key="t-monthly-report">Vehicle Collection Scheduling</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('report.trip-sheet-report') }}" class="nav-link {{ request()->routeIs('report.trip-sheet-report') ? 'active' : '' }}" data-key="t-annual-report">Trip Sheet</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('report.waste-details-report') }}" class="nav-link {{ request()->routeIs('report.waste-details-report') ? 'active' : '' }}" data-key="t-user-report">Waste Details</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('report.vehicle-target-report') }}" class="nav-link {{ request()->routeIs('report.vehicle-target-report') ? 'active' : '' }}" data-key="t-department-report">Vehicle Target </a>
                            </li>
                        </ul>
                    </div>
                </li>


                @canany(['users.view', 'roles.view'])
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('users.index') || request()->routeIs('roles.index')  ? 'active' : 'collapsed' }}" href="#usermanagementnew" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="usermanagement">
                        <i class="bx bx-user-circle"></i>
                        <span data-key="t-layouts">User Management</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('users.index') ||  request()->routeIs('roles.index')  ? 'show' : '' }}" id="usermanagementnew">
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


<div class="vertical-overlay"></div>
