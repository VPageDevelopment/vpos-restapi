<?php


  // view all item kit ...
  $app->get('/api/v1/item-kits' ,'ItemKitController:showItemKits');

  // view single item kit ...
  $app->get('/api/v1/item-kit/{id}' ,'ItemKitController:showItemKit');

  // add new item kit ....
  $app->post('/api/v1/item-kits/add' ,'ItemKitController:addItemKit');

  // update existing item kit ...
  $app->put('/api/v1/item-kit/update/{id}' ,'ItemKitController:updateItemKit');

  // //delte existing item kit ....
  $app->delete('/api/v1/item-kit/delete/{id}' , 'ItemKitController:deleteItemKit');
