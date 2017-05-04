<?php

  namespace App\Controllers;

  class StoreConfigLocalController
  {
      public function viewStoreConfigLocal($request , $response)
      {
        $db = pdo();
        $selectStoreConfig = $db->select()->from('store_config_localisation');
        $stmt = $selectStoreConfig->execute();
        $data = $stmt->fetchAll();
        $db = null;

     if($data != null){
        return $response->withHeader('Content-Type' , 'application/json')
                        ->withJson(["Store Config Localisation" => $data]);
      } else {

        return $response->withHeader('Content-Type','application/json')
                        ->withJson([
                                    "code" => "404",
                                    "message" => "No records found"
                                  ]);
          }
      } // /md: showItemKits ..




      public function updateStoreConfigLocal($request , $response)
      {

                        $localisation = $request->getParam('localisation') ?? $data['localisation'] ;
                        $thousands_seperator = $request->getParam('thousands_seperator') ?? $data['thousands_seperator'] ;
                        $currency_symbol = $request->getParam('currency_symbol') ?? $data['currency_symbol'] ;
                        $currency_decimals = $request->getParam('currency_decimals') ?? $data['currency_decimals'] ;
                        $tax_decimals = $request->getParam('tax_decimals') ?? $data['tax_decimals'] ;
                        $quantity_decimals = $request->getParam('quantity_decimals') ?? $data['quantity_decimals'] ;
                        $payment_option_order = $request->getParam('payment_option_order') ?? $data['payment_option_order'] ;
                        $country_code = $request->getParam('country_code') ?? $data['country_code'] ;
                        $language = $request->getParam('language') ?? $data['language'] ;
                        $timezone = $request->getParam('timezone') ?? $data['timezone'] ;
                        $data_format = $request->getParam('data_format') ?? $data['data_format'] ;
                        $time_format = $request->getParam('time_format') ?? $data['time_format'] ;
                        $updated_at = getUpdateTime();

                        $db = pdo();

                        // update the itemKit ...
                        $updateStatement = $db->update(array(
                                    'localisation ' => $localisation  ,
                                    'thousands_seperator' => $thousands_seperator ,
                                    'currency_symbol' => $currency_symbol,
                                    'currency_decimals' => $currency_decimals,
                                    'tax_decimals' => $tax_decimals,
                                    'quantity_decimals' => $quantity_decimals,
                                    'payment_option_order' => $payment_option_order,
                                    'country_code' => $country_code,
                                    'language' => $language,
                                    'timezone' => $timezone,
                                    'data_format' => $data_format,
                                    'time_format' => $time_format,
                                    'updated_at' => $updated_at
                                    ))
                                    ->table('store_config_localisation')
                                    ->where('sc_local_id' , '=' ,1);

                        $updateStatement->execute();

                        $db = null;


                        return $response->withHeader('Content-Type' , 'application/json')
                                    ->withJson([
                                        'code' => '200',
                                        'message' => ' Record updated  successfully .']);

      }// /md: updateItemKit



} // /ctrl:ItemKit
