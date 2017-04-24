<?php

  // CustomerController
  $container['CustomerController'] = function ($container){
    $table = $container->get('db')->table('customer');
    return new \App\Controllers\CustomerController($table);
  };

  // SupplierController
  $container['SupplierController'] = function ($container){
    $table = $container->get('db')->table('supplier');
    return new \App\Controllers\SupplierController;
  };

  // ItemController
  $container['ItemController'] = function ($container){
    $table = $container->get('db')->table('items');
    return new \App\Controllers\ItemController;
  };
