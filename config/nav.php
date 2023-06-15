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
                'route' => ["admin.edit.shipping.methods", ['free']],
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
                'route' => ['admin.brands.index'],
                'title' => 'Show All',
                'active' => 'dashboard.dashboard',
                'count' => 0,
                'sub_menu' => []
            ],
            [
                'icon' => 'la la-home',
                'route' => ['admin.brands.create'],
                'title' => 'Add New',
                'active' => 'dashboard.dashboard',
                'count' => 0,
                'sub_menu' => []
            ],
        ]
    ],
    [
        'icon' => 'la la-home',
        'route' => ['admin.tags.index'],
        'title' => 'Tags',
        'active' => 'dashboard.dashboard',
        'count' => 0,
        'sub_menu' => [
            [
                'icon' => 'la la-home',
                'route' => ['admin.tags.index'],
                'title' => 'Show All',
                'active' => 'dashboard.dashboard',
                'count' => 0,
                'sub_menu' => []
            ],
            [
                'icon' => 'la la-home',
                'route' => ['admin.tags.create'],
                'title' => 'Add New',
                'active' => 'dashboard.dashboard',
                'count' => 0,
                'sub_menu' => []
            ],
        ]
    ],
    [
        'icon' => 'la la-home',
        'route' => ['admin.products.index'],
        'title' => 'Products',
        'active' => 'dashboard.dashboard',
        'count' => 0,
        'sub_menu' => [
            [
                'icon' => 'la la-home',
                'route' => ['admin.products.index'],
                'title' => 'Show All',
                'active' => 'dashboard.dashboard',
                'count' => 0,
                'sub_menu' => []
            ],
            [
                'icon' => 'la la-home',
                'route' => ['admin.products.create'],
                'title' => 'Add New',
                'active' => 'dashboard.dashboard',
                'count' => 0,
                'sub_menu' => []
            ],
        ]
    ],
    [
        'icon' => 'la la-home',
        'route' => ['admin.products.index'],
        'title' => 'Product Attributes',
        'active' => 'dashboard.dashboard',
        'count' => 0,
        'sub_menu' => [
            [
                'icon' => 'la la-home',
                'route' => ['admin.products.attributes.index'],
                'title' => 'Show All',
                'active' => 'dashboard.dashboard',
                'count' => 0,
                'sub_menu' => []
            ],
            [
                'icon' => 'la la-home',
                'route' => ['admin.products.attributes.create'],
                'title' => 'Add New',
                'active' => 'dashboard.dashboard',
                'count' => 0,
                'sub_menu' => []
            ],
        ]
    ],
    [
        'icon' => 'la la-home',
        'route' => ['admin.products.index'],
        'title' => 'Product Options',
        'active' => 'dashboard.dashboard',
        'count' => 0,
        'sub_menu' => [
            [
                'icon' => 'la la-home',
                'route' => ['admin.options.index'],
                'title' => 'Show All',
                'active' => 'dashboard.dashboard',
                'count' => 0,
                'sub_menu' => []
            ],
            [
                'icon' => 'la la-home',
                'route' => ['admin.options.create'],
                'title' => 'Add New',
                'active' => 'dashboard.dashboard',
                'count' => 0,
                'sub_menu' => []
            ],
        ]
    ],
    [
        'icon' => 'la la-home',
        'route' => ['admin.sliders.index'],
        'title' => 'Sliders',
        'active' => 'dashboard.dashboard',
        'count' => 0,
        'sub_menu' => [
            [
                'icon' => 'la la-home',
                'route' => ['admin.sliders.index'],
                'title' => 'Show All',
                'active' => 'dashboard.dashboard',
                'count' => 0,
                'sub_menu' => []
            ],
            [
                'icon' => 'la la-home',
                'route' => ['admin.sliders.create'],
                'title' => 'Add New',
                'active' => 'dashboard.dashboard',
                'count' => 0,
                'sub_menu' => []
            ],
        ]
    ],
];