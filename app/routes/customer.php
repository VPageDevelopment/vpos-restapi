<?php

  // customer routes ..
  
  // view all customer ...
  $app->get('/api/v1/customers' ,'CustomerController:showCustomers');

  // view single customer ...
  $app->get('/api/v1/customer/{id}' ,'CustomerController:showCustomer');

  // add new customer ....
  $app->post('/api/v1/customers/add' ,'CustomerController:addCustomer');

  // update existing customer ...
  $app->put('/api/v1/customer/update/{id}' ,'CustomerController:updateCustomer');

  //delte existing customer .... 
  $app->delete('/api/v1/customer/delete/{id}' , 'CustomerController:deleteCustomer');
