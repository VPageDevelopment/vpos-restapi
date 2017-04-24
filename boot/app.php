<?php

  require __DIR__ . '/../vendor/autoload.php';

  $app = new \Slim\App([
    "settings" =>[
      'determineRouteBeforeAppMiddleware' => false,
      'displayErrorDetails' => true ,
      'db' => [
        'driver' => 'mysql',
        'host' =>'localhost',
        'database' => 'vpos',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => '',
      ]
  ],
  ]);

  $container = $app->getContainer();

  // importing the db container files ....

  require __DIR__ . '/./container/db.php';



  // importing the controller config files ...
  require __DIR__ . '/./container/controller.php';



  // importing the  routes boot files ...
  require __DIR__ . '/../app/routes/boot.php';
