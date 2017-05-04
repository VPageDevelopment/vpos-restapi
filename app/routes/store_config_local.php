<?php

// view all item ...
$app->get('/api/v1/store-config-local/view' ,'StoreConfigLocalController:viewStoreConfigLocal');

// update the store config info ...
$app->put('/api/v1/store-config-local/update' ,'StoreConfigLocalController:updateStoreConfigLocal');
