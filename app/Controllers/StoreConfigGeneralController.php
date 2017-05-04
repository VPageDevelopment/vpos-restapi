<?php

  namespace App\Controllers;

  class StoreConfigGeneralController
  {
      public function viewStoreConfigGeneral($request , $response)
      {
        $db = pdo();
        $selectStoreConfig = $db->select()->from('store_config_general');
        $stmt = $selectStoreConfig->execute();
        $data = $stmt->fetchAll();
        $db = null;

     if($data != null){
        return $response->withHeader('Content-Type' , 'application/json')
                        ->withJson(["Store Config Information" => $data]);
      } else {

        return $response->withHeader('Content-Type','application/json')
                        ->withJson([
                                    "code" => "404",
                                    "message" => "No records found"
                                  ]);
          }
      } // /md: showItemKits ..




      public function updateStoreConfigGeneral($request , $response)
      {

                        $theme = $request->getParam('theme') ?? $data['theme'] ;
                        $tax_one = $request->getParam('tax_one') ?? $data['tax_one'] ;
                        $tax_two = $request->getParam('tax_two') ?? $data['tax_two'] ;
                        $tax_included = $request->getParam('tax_included') ?? $data['tax_included'] ;
                        $default_sale_discount = $request->getParam('default_sale_discount') ?? $data['default_sale_discount'] ;
                        $calc_aveg_price = $request->getParam('calc_aveg_price') ?? $data['calc_aveg_price'] ;
                        $lines_per_page = $request->getParam('lines_per_page') ?? $data['lines_per_page'] ;
                        $notification_popup_position_one = $request->getParam('notification_popup_position_one') ?? $data['notification_popup_position_one'] ;
                        $notification_popup_position_two = $request->getParam('notification_popup_position_two') ?? $data['notification_popup_position_two'] ;
                        $send_statistic = $request->getParam('send_statistic') ?? $data['send_statistic'] ;
                        $custom_field_1 = $request->getParam('custom_field_1') ?? $data['custom_field_1'] ;
                        $custom_field_2 = $request->getParam('custom_field_2') ?? $data['custom_field_2'] ;
                        $custom_field_3 = $request->getParam('custom_field_3') ?? $data['custom_field_3'] ;
                        $custom_field_4 = $request->getParam('custom_field_4') ?? $data['custom_field_4'] ;
                        $custom_field_5 = $request->getParam('custom_field_5') ?? $data['custom_field_5'] ;
                        $custom_field_6 = $request->getParam('custom_field_6') ?? $data['custom_field_6'] ;
                        $custom_field_7 = $request->getParam('custom_field_7') ?? $data['custom_field_7'] ;
                        $custom_field_8 = $request->getParam('custom_field_8') ?? $data['custom_field_8'] ;
                        $custom_field_9 = $request->getParam('custom_field_9') ?? $data['custom_field_9'] ;
                        $updated_at = getUpdateTime();

                        $db = pdo();

                        // update the itemKit ...
                        $updateStatement = $db->update(array(
                                    'theme ' => $theme  ,
                                    'tax_one' => $tax_one ,
                                    'tax_two' => $tax_two,
                                    'tax_included' => $tax_included,
                                    'default_sale_discount' => $default_sale_discount,
                                    'calc_aveg_price' => $calc_aveg_price,
                                    'lines_per_page' => $lines_per_page,
                                    'notification_popup_position_one' => $notification_popup_position_one,
                                    'notification_popup_position_two' => $notification_popup_position_two,
                                    'send_statistic' => $send_statistic,
                                    'custom_field_1' => $custom_field_1,
                                    'custom_field_2' => $custom_field_2,
                                    'custom_field_3' => $custom_field_3,
                                    'custom_field_4' => $custom_field_4,
                                    'custom_field_5' => $custom_field_5,
                                    'custom_field_6' => $custom_field_6,
                                    'custom_field_7' => $custom_field_7,
                                    'custom_field_8' => $custom_field_8,
                                    'custom_field_9' => $custom_field_9,
                                    'updated_at' => $updated_at
                                    ))
                                    ->table('store_config_general')
                                    ->where('sc_general_id' , '=' ,1);

                        $updateStatement->execute();

                        $db = null;


                        return $response->withHeader('Content-Type' , 'application/json')
                                    ->withJson([
                                        'code' => '200',
                                        'message' => ' Record updated  successfully .']);

      }// /md: updateItemKit



} // /ctrl:ItemKit
