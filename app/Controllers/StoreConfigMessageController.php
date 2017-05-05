<?php

  namespace App\Controllers;

  class StoreConfigMessageController
  {
      public function viewStoreConfigMessage($request , $response)
      {
        $db = pdo();
        $selectStoreConfig = $db->select()->from('store_config_mail');
        $stmt = $selectStoreConfig->execute();
        $data = $stmt->fetchAll();
        $db = null;

     if($data != null){
        return $response->withHeader('Content-Type' , 'application/json')
                        ->withJson(["Store Config Message" => $data]);
      } else {

        return $response->withHeader('Content-Type','application/json')
                        ->withJson([
                                    "code" => "404",
                                    "message" => "No records found"
                                  ]);
          }
      } // /md: showItemKits ..

      public function updateStoreConfigMessage($request , $response)
      {

                      $receipt_template = $request->getParam('receipt_template') ?? $data['receipt_template'] ;
                      $show_taxes = $request->getParam('show_taxes') ?? $data['show_taxes'] ;
                      $show_desc = $request->getParam('show_desc') ?? $data['show_desc'] ;
                      $show_sno = $request->getParam('show_sno') ?? $data['show_sno'] ;
                      $show_print_dialog = $request->getParam('show_print_dialog') ?? $data['show_print_dialog'] ;
                      $print_browser_header = $request->getParam('print_browser_header') ?? $data['print_browser_header'] ;
                      $print_browser_footer = $request->getParam('print_browser_footer') ?? $data['print_browser_footer'] ;
                      $ticket_printer = $request->getParam('ticket_printer') ?? $data['ticket_printer'] ;
                      $invoice_printer = $request->getParam('invoice_printer') ?? $data['invoice_printer'] ;
                      $takings_printer = $request->getParam('takings_printer') ?? $data['takings_printer'] ;
                      $margin_top = $request->getParam('margin_top') ?? $data['margin_top'] ;
                      $margin_left = $request->getParam('margin_left') ?? $data['margin_left'] ;
                      $margin_bottom = $request->getParam('margin_bottom') ?? $data['margin_bottom'] ;
                      $margin_right   = $request->getParam('margin_right') ?? $data['margin_right'] ;
                      $updated_at = getUpdateTime();

                        $db = pdo();

                        // update the itemKit ...
                        $updateStatement = $db->update(array(
                                    'receipt_template ' => $receipt_template  ,
                                    'show_taxes' => $show_taxes ,
                                    'show_desc' => $show_desc,
                                    'show_sno' => $show_sno,
                                    'show_print_dialog' => $show_print_dialog,
                                    'print_browser_header' => $print_browser_header,
                                    'print_browser_footer' => $print_browser_footer,
                                    'ticket_printer' => $ticket_printer,
                                    'invoice_printer' => $invoice_printer,
                                    'takings_printer' => $takings_printer,
                                    'margin_top' => $margin_top,
                                    'margin_left' => $margin_left,
                                    'margin_bottom' => $margin_bottom,
                                    'margin_right' => $margin_right,
                                    'updated_at' => $updated_at
                                    ))
                                    ->table('store_config_receipt')
                                    ->where('sc_receipt_id' , '=' ,1);

                        $updateStatement->execute();

                        $db = null;


                        return $response->withHeader('Content-Type' , 'application/json')
                                    ->withJson([
                                        'code' => '204',
                                        'message' => ' Record updated  successfully .']);

      }// /md: updateItemKit



} // /ctrl:ItemKit
