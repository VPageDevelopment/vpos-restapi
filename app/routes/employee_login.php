<?php

  // employee routes ..

  // view all employee ...
  $app->get('/api/v1/employees-login' ,'EmployeeLoginController:showEmployeesLogin');

  // view single employee ...
  $app->get('/api/v1/employee-login/{id}' ,'EmployeeLoginController:showEmployeeLogin');

  // add new employee ....
  $app->post('/api/v1/employees-login/add' ,'EmployeeLoginController:addEmployeeLogin');

  // update existing employee ...
  $app->put('/api/v1/employee-login/update/{id}' ,'EmployeeLoginController:updateEmployeeLogin');

  //delte existing employee ....
  $app->delete('/api/v1/employee-login/delete/{id}' , 'EmployeeLoginController:deleteEmployeeLogin');
