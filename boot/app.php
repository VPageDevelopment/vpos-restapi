<?php

    require __DIR__ . '/../vendor/autoload.php';

    $app = new \Slim\App([
      "settings" =>[
            'determineRouteBeforeAppMiddleware' => true,
            'displayErrorDetails' => true,
            'addContentLengthHeader' => false,
      ],
    ]);

    $container = $app->getContainer();

    // importing the db container files ....
    require __DIR__ . '/./db.php';


    // importing the controller config files ...
    require __DIR__ . '/./container/controller.php';


    // importing the  routes boot files ...
    require __DIR__ . '/../app/routes/boot.php';


    // updated at
    require __DIR__ . '/./helper/helper_function.php';


    // auth
    require __DIR__ . '/./auth.php';
