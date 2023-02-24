<?php

return [
    'site_title' => 'Fullhouse',
    'site_logo' => 'uploads/AdminLTELogo.png',
    'web_paginate' => 5,
    'admin_paginate' => 10,
    'price_range' => [
        '0' => [0, 999999999],
        '1' => [0, 5000000],
        '2' => [5000000, 10000000],
        '3' => [1000000000000],
        '4' => [20000000, 999999999]
    ],
    'area_range' => [
        '0' => [0, 999999999],
        '1' => [0, 30],
        '2' => [30, 50],
        '3' => [50, 100],
        '4' => [100, 999999999]
    ],
    'statuses' => [
        'UNAVAILABLE' => 0,
        'AVAILABLE' => 1,
        'DEPOSITED' => 2
    ] 
];