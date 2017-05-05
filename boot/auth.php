<?php

use \Slim\Middleware\HttpBasicAuthentication\PdoAuthenticator;


$pdoAuth = new \PDO('mysql:host=localhost;dbname=vpos;charset=utf8', 'root', '');


 $app->add(new \Slim\Middleware\HttpBasicAuthentication([
      "path" => ["/api"],
      "passthrough" => ["/api/auth"],
      "realm" => "Protected",
      "pdo" => $pdoAuth,
      "table"=> "",
      "user"=>"",
      "hash"=>""
]));
