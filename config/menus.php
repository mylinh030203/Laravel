<?php
return [
    [
        'title' => 'Tài khoản',
        'name' => 'account',
        'route' => 'admin.account.index',
        'children' => [
            [
                'title' => 'Danh sách tài khoản',
                'name' => 'index',
                'route' => 'admin.account.index',
            ],
            [
                'title' => 'Thêm tài khoản',
                'name' => 'create',
                'route' => 'admin.account.showcreate',
            ],
            [
                'title' => 'Sửa tài khoản',
                'name' => 'edit',
            ]
        ],
    ],
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
        'title' => 'Đăng Nhập',
        'name' => 'Login',
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
    [
        'title' => 'Sản phẩm',
        'name' => 'product',
        'route' => 'product',
        'children' => [
            [
                'title' => 'Danh sách sản phẩm',
                'name' => 'index',
                'route' => 'admin.product.index',
            ],
            [
                'title' => 'Thêm sản phẩm',
                'name' => 'create',
                'route' => 'admin.product.showcreate',
            ]
        ],
    ],
    [
        'title' => 'Loại sản phẩm',
        'name' => 'type_product',
        'route' => 'typeProduct',
        'children' => [
            [
                'title' => 'Danh sách loại sản phẩm',
                'name' => 'index',
                'route' => 'admin.type_product.index',
            ],
            [
                'title' => 'Thêm sản phẩm',
                'name' => 'create',
                'route' => 'admin.type_product.showcreate',
            ]
        ],
    ],
];
