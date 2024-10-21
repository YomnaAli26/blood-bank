<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="{{ route("admin.dashboard") }}" class="brand-link">
            <!--begin::Brand Image-->
            <img src="{{asset("admin/assets/img/AdminLTELogo.png")}}" alt="AdminLTE Logo"
                 class="brand-image opacity-75 shadow">
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">Dashboard</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->

    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route("admin.dashboard") }}" class="nav-link">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Governorates -->
                <li class="nav-item">
                    <a href="{{ route("admin.governorates.index") }}" class="nav-link">
                        <i class="nav-icon bi bi-globe"></i>
                        <p>Governorates</p>
                    </a>
                </li>

                <!-- Cities -->
                <li class="nav-item">
                    <a href="{{ route("admin.cities.index") }}" class="nav-link">
                        <i class="nav-icon bi bi-buildings"></i>
                        <p>Cities</p>
                    </a>
                </li>

                <!-- Categories -->
                <li class="nav-item">
                    <a href="{{ route("admin.categories.index") }}" class="nav-link">
                        <i class="nav-icon bi bi-tags"></i>
                        <p>Categories</p>
                    </a>
                </li>

                <!-- Clients -->
                <li class="nav-item">
                    <a href="{{ route("admin.clients.index") }}" class="nav-link">
                        <i class="nav-icon bi bi-people"></i>
                        <p>Clients</p>
                    </a>
                </li>

                <!-- Posts -->
                <li class="nav-item">
                    <a href="{{ route("admin.posts.index") }}" class="nav-link">
                        <i class="nav-icon bi bi-card-text"></i>
                        <p>Posts</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route("admin.donation-requests.index") }}" class="nav-link">
                        <i class="nav-icon bi bi-heart-fill"></i>
                        <p>Donation Requests</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route("admin.settings.index") }}" class="nav-link">
                        <i class="nav-icon bi bi-gear-fill"></i>
                        <p>Settings</p>
                    </a>
                </li>

            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->
