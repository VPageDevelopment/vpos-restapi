<?php

  namespace App\Controllers;

  class itemController
  {
      public function index($request , $response)
      {
          return $response->withJson(["message" => "itemController"]);
      }
  }
