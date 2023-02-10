<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    @php

    @endphp
    <a href="{{route('admin.apartments.index')}}" class="brand-link">
        <!-- <img src="{{asset(config('site-settings.site_logo'))}}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <p class="brand-text font-weight-light text-center">{{config('site-settings.site_title')}}</p>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column brand-link">
                <li class="nav-item">
                    <a href="{{route('admin.users.edit', Auth::user()->id)}}" class="nav-link">
                        <p>
                            Current user: {{ Auth::user()->name }}
                        </p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('admin.apartments.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Apartments
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.users.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('logout')}}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
            <div class="text-center mt-3">
                <a href="{{route('index')}}" class="btn btn-primary text-white">Go to Fullhouse site</a>
            </div>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>