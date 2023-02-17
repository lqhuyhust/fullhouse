<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    @php

    @endphp
    <a href="{{route('admin.dashboard')}}" class="brand-link">
        <p class="brand-text font-weight-light text-center">{{config('site-settings.site_title')}}</p>
    </a>
    <div class="sidebar">
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
                <li class="nav-item">
                    <a href="{{route('admin.apartments.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Apartments
                        </p>
                    </a>
                </li>
                @if ( Auth::user()->is_admin == 1 ) 
                <li class="nav-item">
                    <a href="{{route('admin.users.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                @endif
                <li class="nav-item">
                    <a href="{{route('admin.change_password', Auth::user()->id)}}" class="nav-link">
                        <i class="nav-icon fas fa-key"></i>
                        <p>
                            Change Password
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
                <a href="{{route('index')}}" class="btn btn-primary text-white mt-4">Go to Fullhouse site</a>
            </div>
        </nav>
    </div>
</aside>