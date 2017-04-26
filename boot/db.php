<?php

// adding pdo to the container ...

//  function connect_db(){
//      $server = 'localhost';
//      $user = '';
//      $pass = '';
//      $database = '';
//      $connection = new mysqli($server, $user, $pass, $database);
//      return $connection;
// }


function pdo(){
  $dsn = 'mysql:host=localhost;dbname=;charset=utf8';
  $usr = '';
  $pwd = '';

  $pdo = new \Slim\PDO\Database($dsn, $usr, $pwd);
  return $pdo;
}
