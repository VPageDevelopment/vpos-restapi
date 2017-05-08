<?php

use \Psr\Http\Message\{
    ServerRequestInterface as Request ,
    ResponseInterface as Response
  };


  $check_auth_user = function ($request, $response, $next) {
  	if (isset($_SERVER['PHP_AUTH_USER'])) {
  		$response = $next($request, $response);
  	} else {
  		return $response->withJson(array('error' => 'AUTH_USER'), 403);
  	}
  	return $response;
  };


  $app->get('/auth',function($request , $response){

    $auth_username = $_SERVER['PHP_AUTH_USER'];

    return $response
                ->withHeader('Content-Type' , 'application/json')
                ->withJson([
                              'username' => $auth_username,
                              'status' => 'ok'
                            ]);
  })->add($check_auth_user);
