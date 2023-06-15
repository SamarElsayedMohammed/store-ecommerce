<?php

return [
    [
        'icon' => 'la la-home',
        'route' => ["admin.home"],
        'title' => 'Dashboard',
        'active' => 'dashboard.dashboard',
        'count' => config('navcounts.mainCat'),
        'sub_menu' => []
    ],
    [
        'icon' => 'la la-trash',
        'route' => ['admin.home'],
        'title' => 'Settings',
        'active' => 'dashboard.dashboard',
        'count' => 0,
        'sub_menu' => [
            [
                'icon' => 'la la-trash',
                'route' => ["admin.edit.shipping.methods",['free']],
                'title' => 'Shipping Methods',
                'active' => 'dashboard.dashboard',
                'count' => 0,
                'sub_menu' => [
                    [
                        'icon' => 'la la-home',
                        'route' => ["admin.edit.shipping.methods", ['free']],
                        'title' => 'Free Shipping',
                        'active' => 'dashboard.dashboard',
                        'count' => 0,
                        'sub_menu' => []
                    ],
                    [
                        'icon' => 'la la-home',
                        'route' => ["admin.edit.shipping.methods", ['inner']],
                        'title' => 'Local Shipping',
                        'active' => 'dashboard.dashboard',
                        'count' => 0,

                        'sub_menu' => []
                    ],
                    [
                        'icon' => 'la la-home',
                        'route' => ["admin.edit.shipping.methods", ['outer']],
                        'title' => 'Outer Shipping',
                        'active' => 'dashboard.dashboard',
                        'count' => 0,

                        'sub_menu' => []
                    ],
                ]
            ],
        ]
    ],
    [
        'icon' => 'la la-home',
        'route' => ['admin.maincategories.index'],
        'title' => 'Main Categories',
        'active' => 'dashboard.dashboard',
        'count' => 0,
        'sub_menu' => [
            [
                'icon' => 'la la-home',
                'route' => ['admin.maincategories.index'],
                'title' => 'Show All',
                'active' => 'dashboard.dashboard',
                'count' => 0,
                'sub_menu' => []
            ],
            [
                'icon' => 'la la-home',
                'route' => ['admin.maincategories.create'],
                'title' => 'Add New',
                'active' => 'dashboard.dashboard',
                'count' => 0,
                'sub_menu' => []
            ],
        ]
    ],
    [
        'icon' => 'la la-home',
        'route' => ['admin.subcategories.index'],
        'title' => 'Sub Categories',
        'active' => 'dashboard.dashboard',
        'count' => 0,
        'sub_menu' => [
            [
                'icon' => 'la la-home',
                'route' => ['admin.subcategories.index'],
                'title' => 'Show All',
                'active' => 'dashboard.dashboard',
                'count' => 0,
                'sub_menu' => []
            ],
            [
                'icon' => 'la la-home',
                'route' => ['admin.maincategories.create'],
                'title' => 'Add New',
                'active' => 'dashboard.dashboard',
                'count' => 0,
                'sub_menu' => []
            ],
        ]
    ],
    [
        'icon' => 'la la-home',
        'route' => ['admin.subcategories.index'],
        'title' => 'Brands',
        'active' => 'dashboard.dashboard',
        'count' => 0,
        'sub_menu' => [
            [
                'icon' => 'la la-home',
                'route' => ['admin.subcategories.index'],
                'title' => 'Show All',
                'active' => 'dashboard.dashboard',
                'count' => 0,
                'sub_menu' => []
            ],
            [
                'icon' => 'la la-home',
                'route' => ['admin.maincategories.create'],
                'title' => 'Add New',
                'active' => 'dashboard.dashboard',
                'count' => 0,
                'sub_menu' => []
            ],
        ]
    ],

];