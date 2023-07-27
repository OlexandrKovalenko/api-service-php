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
    'terminal/activate/{id:\d+}' => [
        'controller' => 'terminal',
        'action' => 'activate'
    ],
    'terminal/create' => [
        'controller' => 'terminal',
        'action' => 'create'
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
    'equipment/create' => [
        'controller' => 'equipment',
        'action' => 'create'
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
    'case/create' => [
        'controller' => 'body',
        'action' => 'create'
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
    'counterparty/create' => [
        'controller' => 'counterparty',
        'action' => 'create'
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
    'sim-card/create' => [
        'controller' => 'simcard',
        'action' => 'create'
    ],

];