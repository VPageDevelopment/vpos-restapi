<?php

// adding pdo to the container ...

//  function connect_db(){
//      $server = 'localhost';
//      $user = 'root';
//      $pass = '';
//      $database = 'vpos';
//      $connection = new mysqli($server, $user, $pass, $database);
//      return $connection;
// }


function pdo(){
  $dsn = 'mysql:host=localhost;dbname=vpos;charset=utf8';
  $usr = 'root';
  $pwd = '';

  $pdo = new \Slim\PDO\Database($dsn, $usr, $pwd);
  return $pdo;
}
