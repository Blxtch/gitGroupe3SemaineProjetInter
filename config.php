<?php

$configLocal = [
    'host' => 'localhost',
    'user' => 'AdminISIM',
    'password' => 'Test123*',
    'database' => 'dbsemaineprojetdef',
];


$configLDAP = [
    'host' => '192.160.110.1',
    'port' => 389, //PORT DE LDAP J'IMAGINE
    'user' => 'julien.magnier@delivISIM.lan',
    'password' => 'Test123*',
];

$mode = 'local'; 

$config = ($mode === 'ldap') ? $configLDAP : $configLocal;