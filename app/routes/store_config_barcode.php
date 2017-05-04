<?php

// view all item ...
$app->get('/api/v1/store-config-barcode/view' ,'StoreConfigBarcodeController:viewStoreConfigBarcode');

// update the store config info ...
$app->put('/api/v1/store-config-barcode/update' ,'StoreConfigBarcodeController:updateStoreConfigBarcode');
