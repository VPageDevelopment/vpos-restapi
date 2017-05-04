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





  // StoreConfigController
  $container['StoreConfigController'] = function ($container){
    return new \App\Controllers\StoreConfigController;
  };

  // StoreConfigGeneralController
  $container['StoreConfigGeneralController'] = function ($container){
    return new \App\Controllers\StoreConfigGeneralController;
  };

  // StoreConfigLocalController
  $container['StoreConfigLocalController'] = function ($container){
    return new \App\Controllers\StoreConfigLocalController;
  };


  // StoreConfigBarcodeController
  $container['StoreConfigBarcodeController'] = function ($container){
    return new \App\Controllers\StoreConfigBarcodeController;
  };


  // StoreConfigStockController
  $container['StoreConfigStockController'] = function ($container){
    return new \App\Controllers\StoreConfigStockController;
  };


  // StoreConfigReceiptController
  $container['StoreConfigReceiptController'] = function ($container){
    return new \App\Controllers\StoreConfigReceiptController;
  };

  // StoreConfigInvoiceController
  $container['StoreConfigInvoiceController'] = function ($container){
    return new \App\Controllers\StoreConfigInvoiceController;
  };

  // StoreConfigMailController
  $container['StoreConfigMailController'] = function ($container){
    return new \App\Controllers\StoreConfigMailController;
  };


  // StoreConfigMessageController
  $container['StoreConfigMessageController'] = function ($container){
    return new \App\Controllers\StoreConfigMessageController;
  };
