<?php

return [
    //frontend rules
    'frontend' => [
        '' => [
            'controller' => 'default',
            'action' => 'index',
        ],
        'default/index' => [
            'controller' => 'default',
            'action' => 'index',
        ],
        'auth' => [
            'controller' => 'auth',
            'action' => 'login',
        ],
        'auth/login' => [
            'controller' => 'auth',
            'action' => 'login',
        ],
        'auth/reg' => [
            'controller' => 'auth',
            'action' => 'reg',
        ],
    ],
    //backend rules
    'backend' => [
        'backend' => [
            'controller' => 'default',
            'action' => 'index',
        ],
        'backend/default' => [
            'controller' => 'default',
            'action' => 'index',
        ],
        'backend/default/index' => [
            'controller' => 'default',
            'action' => 'index',
        ],
        'backend/logout' => [
            'controller' => 'default',
            'action' => 'logout',
        ],
        'backend/default/logout' => [
            'controller' => 'default',
            'action' => 'logout',
        ],
        'backend/client/view/{id:\d+}' => [
            'controller' => 'client',
            'action' => 'view',
        ],
        'backend/client/index/{page:\d+}' => [
            'controller' => 'client',
            'action' => 'index',
        ],
        'backend/client/index' => [
            'controller' => 'client',
            'action' => 'index',
        ],
    ],
];