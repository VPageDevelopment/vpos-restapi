<?php

  namespace App\Controllers;

  class SupplierController
  {
      public function index($request , $response)
      {
          return $response->withJson(["message" => "SupplierController"]);
      }
  }
