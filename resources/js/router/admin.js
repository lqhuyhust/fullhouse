const admin = [
    {
        path: '/admin',
        name: 'admin',
        component: () => import('../components/admin.vue'),
        children: [
            {
                path: 'users',
                name: 'admin-users',
                component: () => import('../components/admin/users/index.vue')
            },
            {
                path: 'users/create',
                name: 'admin-users-create',
                component: () => import('../components/admin/users/create.vue')
            },
            {
                path: 'users/edit/:id',
                name: 'admin-users-edit',
                component: () => import('../components/admin/users/edit.vue'),
                props: true
            },
            {
                path: 'users/:id',
                name: 'admin-users-view',
                component: () => import('../components/admin/users/view.vue'),
                props: true
            },
            {
                path: 'users/change-password/:id',
                name: 'admin-users-change-password',
                component: () => import('../components/admin/users/changePassword.vue'),
                props: true
            },
            {
                path: 'apartments',
                name: 'admin-apartments',
                component: () => import('../components/admin/apartments/index.vue')
            },
            {
                path: 'apartments/create',
                name: 'admin-apartments-create',
                component: () => import('../components/admin/apartments/create.vue')
            },
            {
                path: 'apartments/edit/:id',
                name: 'admin-apartments-edit',
                component: () => import('../components/admin/apartments/edit.vue'),
                props: true
            },
            {
                path: 'apartments/:id',
                name: 'admin-apartments-view',
                component: () => import('../components/admin/apartments/view.vue'),
                props: true
            }
        ]
    }
];

export default admin;