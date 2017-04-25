<?php

  // CustomerController
  $container['CustomerController'] = function ($container){
    return new \App\Controllers\CustomerController;
  };

  // SupplierController
  $container['SupplierController'] = function ($container){

    return new \App\Controllers\SupplierController;
  };

  // ItemController
  $container['ItemController'] = function ($container){
    return new \App\Controllers\ItemController;
  };
