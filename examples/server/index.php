<?php

require_once __DIR__ . '/../../vendor/autoload.php';

session_start();

$options = [
    'authentication' => [
        'ad' => [
            'client_id'     => '',
            'client_secret' => '',
            'enabled'       => '1',
            'directory'     => '',
            'return_url'    => ''
        ]
    ]
];

$request = \Zend\Psr7Bridge\Psr7ServerRequest::fromZend(new \Zend\Http\PhpEnvironment\Request());
$config  = new \Magium\Configuration\Config\Repository\ArrayConfigurationRepository($options);
$adapter = new \Magium\ActiveDirectory\ActiveDirectory($config, $request);
$entity  = $adapter->authenticate();

echo $entity->getName() . '<Br />';
echo $entity->getOid() . '<Br />';
echo $entity->getPreferredUsername() . '<Br />';
