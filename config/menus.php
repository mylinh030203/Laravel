<?php
return [
    [
        'title' => 'Phân quyền',
        'name' => 'role',
        'route' => 'admin.role.index',
        'children' => [
            [
                'title' => 'Danh sách quyền',
                'name' => 'index',
                'route' => 'admin.role.index',
            ],
            [
                'title' => 'Thêm quyền',
                'name' => 'create',
                'route' => 'admin.role.showcreate',
            ],
            [
                'title' => 'Sửa quyền',
                'name' => 'edit',
            ]
        ],
    ],
    [
        'title' => 'Tài khoản',
        'name' => 'account',
        'route' => 'login',
        'children' => [
            [
                'title' => 'Đăng Nhập',
                'name' => 'login',
                'route' => 'login',
            ],
            [
                'title' => 'Đăng xuất',
                'name' => 'logout',
                'route' => 'admin.role.showcreate',
            ]
        ],
    ],
];
