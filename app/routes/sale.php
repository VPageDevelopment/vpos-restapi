<?php

    // sale routes ...

    $app->get('/api/v1/sales' ,'SaleController:showSales');

    // single  sale routes ...
    $app->get('/api/v1/sale/{id}' ,'SaleController:showSale');

    // add new Sale ....
    $app->post('/api/v1/sales/add' ,'SaleController:addSales');

    // update existing Sale ...
    $app->put('/api/v1/sale/update/{id}' ,'SaleController:updateSale');

    //delte existing Sale ....
    $app->delete('/api/v1/sale/delete/{id}' , 'SaleController:deleteSales');
