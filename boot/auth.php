<?php

// fetching the user from the data base ...




function getUsers(){
  $db = pdo();
  $selectStmt = $db->select(['user_name' , 'password'])->from('employee_login');
  $stmt = $selectStmt->execute();
  $data = $stmt->fetchAll();
  $db = null;
    $users = array();
    foreach ($data as $key => $value) {
        $users[$value['user_name']] = $value['password'];
    }
    return $users;
};



// auth Middleware..

$app->add(new \Slim\Middleware\HttpBasicAuthentication([
    "path" =>  ["/auth", "/api"],
    "realm" => "Protected",
    "secure" => false,
    "users" => getUsers()
]));
