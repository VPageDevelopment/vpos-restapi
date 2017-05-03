<?php

  // view all gift-card ...
  $app->get('/api/v1/gift-cards' ,'GiftCardController:showGiftCards');

  // view single gift-card ...
  $app->get('/api/v1/gift-card/{id}' ,'GiftCardController:showGiftCard');

  // add new gift-card ....
  $app->post('/api/v1/gift-cards/add' ,'GiftCardController:addGiftCard');

  // update existing gift-card ...
  $app->put('/api/v1/gift-card/update/{id}' ,'GiftCardController:updateGiftCard');

  //delte existing gift-card ....
  $app->delete('/api/v1/gift-card/delete/{id}' , 'GiftCardController:deleteGiftCard');
