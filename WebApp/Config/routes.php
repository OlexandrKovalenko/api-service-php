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
    'terminal/edit/{id:\d+}' => [
        'controller' => 'terminal',
        'action' => 'edit'
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
    'equipment/edit/{id:\d+}' => [
        'controller' => 'equipment',
        'action' => 'edit'
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
    'case/edit/{id:\d+}' => [
        'controller' => 'body',
        'action' => 'edit'
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
    'counterparty/edit/{id:\d+}' => [
        'controller' => 'counterparty',
        'action' => 'edit'
    ],

// SimcardController
    'sim-card' => [
        'controller' => 'simcard',
        'action' => 'index'
    ],
    'sim-card/{id:\d+}' => [
        'controller' => 'simcard',
        'action' => 'show'
    ],
    'sim-card/edit/{id:\d+}' => [
        'controller' => 'simcard',
        'action' => 'edit'
    ],

];