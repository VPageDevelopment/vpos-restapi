<?php

// adding pdo to the container ...

function pdo(){
  $dsn = 'mysql:host=localhost;dbname=vpos;charset=utf8';
  $usr = 'root';
  $pwd = '';

  $pdo = new \Slim\PDO\Database($dsn, $usr, $pwd);
  return $pdo;
}
