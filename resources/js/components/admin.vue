<template>
    <div class="wrapper">
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <router-link :to="{ name: 'admin' }" class="brand-link">
                <p class="brand-text font-weight-light text-center">Fullhouse</p>
            </router-link>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column brand-link">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <p>
                                    Current User
                                </p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <router-link :to="{ name: 'admin-apartments' }" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Apartments
                                </p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link :to="{ name: 'admin-users' }" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Users
                                </p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link :to="{ name: 'admin-apartments' }" class="nav-link">
                                <i class="nav-icon fas fa-key"></i>
                                <p>
                                    Change Password
                                </p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link :to="{ name: 'admin-apartments' }" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Logout
                                </p>
                            </router-link>
                        </li>
                    </ul>
                    <div class="text-center mt-3">
                        <a href="" class="btn btn-primary text-white mt-4">Go to Fullhouse site</a>
                    </div>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            <router-view></router-view>
        </div>
        <footer class="main-footer">
            <strong>Copyright &copy; 2023 <a href="#">fullhouse.com</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>
    </div>
</template>