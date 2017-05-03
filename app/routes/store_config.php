<?php


// view all item ...
$app->get('/api/v1/store-config-info/view' ,'StoreConfigController:viewStoreConfigInfo');

// update the store config info ...
$app->put('/api/v1/store-config-info/update' ,'StoreConfigController:updateStoreConfigInfo');
