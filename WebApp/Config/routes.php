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
// TerminalController
    'terminal' => [
        'controller' => 'terminal',
        'action' => 'index'
    ],
    'terminal/{id:\d+}' => [
        'controller' => 'terminal',
        'action' => 'show'
    ],

// EquipmentController
    'equipment' => [
        'controller' => 'equipment',
        'action' => 'index'
    ],
    'equipment/{id:\d+}' => [
        'controller' => 'equipment',
        'action' => 'show'
    ],
// BodyController
    'case' => [
        'controller' => 'body',
        'action' => 'index'
    ],
    'case/{id:\d+}' => [
        'controller' => 'body',
        'action' => 'show'
    ],
// CounterpartyController
    'counterparty' => [
        'controller' => 'counterparty',
        'action' => 'index'
    ],
    'counterparty/{id:\d+}' => [
        'controller' => 'counterparty',
        'action' => 'show'
    ],
// SimcardController
    'sim-card' => [
        'controller' => 'simcard',
        'action' => 'index'
    ],
];