<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="{{ route('admin.dashboard') }}" class="brand-link d-flex align-items-center justify-content-center">
            <!--begin::Brand Icon-->
            <i class="bi bi-droplet-fill me-2" style="font-size: 1.5rem; color: #dc3545;"></i>
            <!--end::Brand Icon-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">Blood Bank</span>
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
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Governorates -->
                <li class="nav-item">
                    <a href="{{ route('admin.governorates.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-globe"></i>
                        <p>Governorates</p>
                    </a>
                </li>

                <!-- Cities -->
                <li class="nav-item">
                    <a href="{{ route('admin.cities.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-buildings"></i>
                        <p>Cities</p>
                    </a>
                </li>

                <!-- Categories -->
                <li class="nav-item">
                    <a href="{{ route('admin.categories.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-tags"></i>
                        <p>Categories</p>
                    </a>
                </li>

                <!-- Admins -->
                <li class="nav-item">
                    <a href="{{ route('admin.admins.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-person-lock" title="Contact Us Settings"></i>
                        <p>Admins</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.change-password') }}" class="nav-link">
                        <i class="nav-icon bi bi-shield-lock" title="Change Password"></i>
                        <p>Change Password</p>
                    </a>
                </li>


                <!-- Clients -->
                <li class="nav-item">
                    <a href="{{ route('admin.clients.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-people"></i>
                        <p>Clients</p>
                    </a>
                </li>

                <!-- Roles -->
                <li class="nav-item">
                    <a href="{{ route('admin.roles.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-person-badge"></i>
                        <p>Roles</p>
                    </a>
                </li>

                <!-- Permissions -->
                <li class="nav-item">
                    <a href="{{ route('admin.permissions.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-shield-lock"></i>
                        <p>Permissions</p>
                    </a>
                </li>

                <!-- Posts -->
                <li class="nav-item">
                    <a href="{{ route('admin.posts.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-card-text"></i>
                        <p>Posts</p>
                    </a>
                </li>

                <!-- Donation Requests -->
                <li class="nav-item">
                    <a href="{{ route('admin.donation-requests.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-heart-fill"></i>
                        <p>Donation Requests</p>
                    </a>
                </li>

                <!-- Contact Us -->
                <li class="nav-item">
                    <a href="{{ route('admin.contact-us.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-envelope-fill" title="Contact Us Settings"></i>
                        <p>Contact Us</p>
                    </a>
                </li>

                <!-- Settings -->
                <li class="nav-item">
                    <a href="{{ route('admin.settings.index') }}" class="nav-link">
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
