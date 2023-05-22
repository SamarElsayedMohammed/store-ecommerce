<?php

return [
    [
        'icon' => 'la la-home',
        'route' => 'admin.home',
        'title' => 'Dashboard',
        'active' => 'dashboard.dashboard',
    ],
     [
        'icon' => 'la la-trash',
        'route' => 'admin.home',
        'title' => 'Settings',
        'active' => 'dashboard.dashboard',
        'sub_menu'=>[
            [
            'icon' => 'la la-home',
            'route' => 'admin.home',
            'title' => 'Shipping method',
            'active' => 'dashboard.dashboard',
            ],
        ]
    ],
    [
        'icon' => 'la la-trash',
        'route' => 'admin.home',
        'title' => 'Shipping Methods',
        'active' => 'dashboard.dashboard',
        'sub_menu'=>[
            [
            'icon' => 'la la-home',
            'route' =>  "/admin/settings/shipping-method/free",
            'title' => 'Free Shipping',
            'active' =>'dashboard.dashboard',
            ],
            [
            'icon' => 'la la-home',
            'route' =>  "/admin/settings/shipping-method/local",
            'title' => 'Local Shipping',
            'active' => 'dashboard.dashboard',
            ],
            [
            'icon' => 'la la-home',
            'route' =>  "/admin/settings/shipping-method/outer",
            'title' => 'Outer Shipping',
            'active' => 'dashboard.dashboard',
            ],
        ]
    ],
    
];