<?php

  // customer routes ..
  $app->get('/api/v1/customers' ,'CustomerController:customers');
  $app->get('/api/v1/customer/{id}' ,'CustomerController:customer');
  $app->post('/api/v1/customers/add' ,'CustomerController:addCustomer');
