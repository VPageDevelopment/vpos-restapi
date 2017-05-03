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


  // ItemKitController
  $container['ItemKitController'] = function ($container){
    return new \App\Controllers\ItemKitController;
  };


  // SaleController
  $container['SaleController'] = function ($container){
    return new \App\Controllers\SaleController;
  };


  // GiftCardController
  $container['GiftCardController'] = function ($container){
    return new \App\Controllers\GiftCardController;
  };

  // EmployeeController
  $container['EmployeeController'] = function ($container){
    return new \App\Controllers\EmployeeController;
  };


  // EmployeeLoginController
  $container['EmployeeLoginController'] = function ($container){
    return new \App\Controllers\EmployeeLoginController;
  };


  // EmployeePermissionController
  $container['EmployeePermissionController'] = function ($container){
    return new \App\Controllers\EmployeePermissionController;
  };

  // EmployeePermissionController
  $container['StoreConfigController'] = function ($container){
    return new \App\Controllers\StoreConfigController;
  };
