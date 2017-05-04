<?php


// view all item ...
$app->get('/api/v1/store-config-general/view' ,'StoreConfigGeneralController:viewStoreConfigGeneral');

// update the store config info ...
$app->put('/api/v1/store-config-general/update' ,'StoreConfigGeneralController:updateStoreConfigGeneral ');
