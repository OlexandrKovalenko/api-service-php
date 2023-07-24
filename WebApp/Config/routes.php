<?php

return [
    '' => [
        'controller' => 'main',
        'action' => 'index'
    ],
    'login' => [
        'controller' => 'auth',
        'action' => 'login'
    ],
    'login/authorize' => [
        'controller' => 'auth',
        'action' => 'authorization'
    ],
    'logout' => [
        'controller' => 'auth',
        'action' => 'logout'
    ],
    'terminals' => [
        'controller' => 'terminals',
        'action' => 'terminals'
    ],
    'equipments' => [
        'controller' => 'equipments',
        'action' => 'equipments'
    ],
    'cases' => [
        'controller' => 'bodies',
        'action' => 'bodies'
    ],
];