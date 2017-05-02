<?php


  // view all item ...
  $app->get('/api/v1/items' ,'ItemController:showItems');

  // view single item ...
  $app->get('/api/v1/item/{id}' ,'ItemController:showItem');

  // add new item ....
  $app->post('/api/v1/items/add' ,'ItemController:addItem');

  // // upload files ....
  // $app->post('/api/v1/items/upload' , 'ItemController:uploadFile');

  // update existing item ...
  $app->put('/api/v1/item/update/{id}' ,'ItemController:updateItem');


  // //delte existing item ....
  $app->delete('/api/v1/item/delete/{id}' , 'ItemController:deleteItem');
