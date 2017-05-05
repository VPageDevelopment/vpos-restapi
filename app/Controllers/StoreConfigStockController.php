<?php

  namespace App\Controllers;

  class StoreConfigStockController
  {
      public function viewStoreConfigStock($request , $response)
      {
        $db = pdo();
        $selectStoreConfig = $db->select()->from('store-config-stock');
        $stmt = $selectStoreConfig->execute();
        $data = $stmt->fetchAll();
        $db = null;

     if($data != null){
        return $response->withHeader('Content-Type' , 'application/json')
                        ->withJson(["Store Config Stock" => $data]);
      } else {

        return $response->withHeader('Content-Type','application/json')
                        ->withJson([
                                    "code" => "404",
                                    "message" => "No records found"
                                  ]);
          }
      } // /md: showItemKits ..




      public function updateStoreConfigStock($request , $response)
      {

                        $barcode_type = $request->getParam('barcode_type') ?? $data['barcode_type'] ;
                        $barcode_quality = $request->getParam('barcode_quality') ?? $data['barcode_quality'] ;
                        $barcode_width = $request->getParam('barcode_width') ?? $data['barcode_width'] ;
                        $barcode_height = $request->getParam('barcode_height') ?? $data['barcode_height'] ;
                        $font_family = $request->getParam('font_family') ?? $data['font_family'] ;
                        $font_size = $request->getParam('font_size') ?? $data['font_size'] ;
                        $barcode_content = $request->getParam('barcode_content') ?? $data['barcode_content'] ;
                        $barcode_layout_row_1 = $request->getParam('barcode_layout_row_1') ?? $data['barcode_layout_row_1'] ;
                        $barcode_layout_row_2 = $request->getParam('barcode_layout_row_2') ?? $data['barcode_layout_row_2'] ;
                        $barcode_layout_row_3 = $request->getParam('barcode_layout_row_3') ?? $data['barcode_layout_row_3'] ;
                        $num_in_row = $request->getParam('num_in_row') ?? $data['num_in_row'] ;
                        $display_page_width = $request->getParam('display_page_width') ?? $data['display_page_width'] ;
                        $dispaly_page_cellspacing = $request->getParam('dispaly_page_cellspacing') ?? $data['dispaly_page_cellspacing'] ;
                        $updated_at = getUpdateTime();

                        $db = pdo();

                        // update the itemKit ...
                        $updateStatement = $db->update(array(
                                    'barcode_type ' => $barcode_type  ,
                                    'barcode_quality' => $barcode_quality ,
                                    'barcode_width' => $barcode_width,
                                    'barcode_height' => $barcode_height,
                                    'font_family' => $font_family,
                                    'font_size' => $font_size,
                                    'barcode_content' => $barcode_content,
                                    'barcode_layout_row_1' => $barcode_layout_row_1,
                                    'barcode_layout_row_2' => $barcode_layout_row_2,
                                    'barcode_layout_row_3' => $barcode_layout_row_3,
                                    'num_in_row' => $num_in_row,
                                    'display_page_width' => $display_page_width,
                                    'dispaly_page_cellspacing' => $dispaly_page_cellspacing,
                                    'updated_at' => $updated_at
                                    ))
                                    ->table('store_config_barcode')
                                    ->where('sc_barcode_id' , '=' ,1);

                        $updateStatement->execute();

                        $db = null;


                        return $response->withHeader('Content-Type' , 'application/json')
                                    ->withJson([
                                        'code' => '204',
                                        'message' => ' Record updated  successfully .']);

      }// /md: updateItemKit



} // /ctrl:ItemKit
