<?php

    // supplier routes ...

    $app->get('/api/v1/suppliers' ,'SupplierController:showSuppliers');

    // single  supplier routes ... 
    $app->get('/api/v1/supplier/{id}' ,'SupplierController:showSupplier');



  // add new Supplier ....
  $app->post('/api/v1/suppliers/add' ,'SupplierController:addSupplier');

  // update existing Supplier ...
  $app->put('/api/v1/supplier/update/{id}' ,'SupplierController:updateSupplier');

  //delte existing Supplier .... 
  $app->delete('/api/v1/supplier/delete/{id}' , 'SupplierController:deleteSupplier');

