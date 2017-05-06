<?php

// fetching the user from the data base ...
function getUsers(){

  $db = pdo();
  $selectStmt = $db->select()->from('employee_login');
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
    "path" => "/api",
    "realm" => "Protected",
    "users" => getUsers(),
    "error" => function ($request, $response, $arguments) {
        $data = [];
        $data["status"] = "error";
        $data["message"] = $arguments["message"];
        return $response->write(json_encode($data, JSON_UNESCAPED_SLASHES));
    }
]));
