<?php

  // employee routes ..

  // view all employee ...
  $app->get('/api/v1/employees-permission' ,'EmployeePermissionController:showEmployeesPermission');

  // view single employee ...
  $app->get('/api/v1/employee-permission/{id}' ,'EmployeePermissionController:showEmployeePermission');

  // add new employee ....
  $app->post('/api/v1/employees-permission/add' ,'EmployeePermissionController:addEmployeePermission');

  // update existing employee ...
  $app->put('/api/v1/employee-permission/update/{id}' ,'EmployeePermissionController:updateEmployeePermission');

  //delte existing employee ....
  $app->delete('/api/v1/employee-permission/delete/{id}' , 'EmployeePermissionController:deleteEmployeePermission');
