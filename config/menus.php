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
];
