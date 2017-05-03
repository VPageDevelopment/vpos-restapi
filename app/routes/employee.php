<?php

  // employee routes ..

  // view all employee ...
  $app->get('/api/v1/employees' ,'EmployeeController:showEmployees');

  // view single employee ...
  $app->get('/api/v1/employee/{id}' ,'EmployeeController:showEmployee');

  // add new employee ....
  $app->post('/api/v1/employees/add' ,'EmployeeController:addEmployee');

  // update existing employee ...
  $app->put('/api/v1/employee/update/{id}' ,'EmployeeController:updateEmployee');

  //delte existing employee ....
  $app->delete('/api/v1/employee/delete/{id}' , 'EmployeeController:deleteEmployee');
