<?php

  namespace App\Controllers;

  class StoreConfigInvoiceController
  {
      public function viewStoreConfigInvoice($request , $response)
      {
        $db = pdo();
        $selectStoreConfig = $db->select()->from('store_config_invoice');
        $stmt = $selectStoreConfig->execute();
        $data = $stmt->fetchAll();
        $db = null;

     if($data != null){
        return $response->withHeader('Content-Type' , 'application/json')
                        ->withJson(["Store Config Invoice" => $data]);
      } else {

        return $response->withHeader('Content-Type','application/json')
                        ->withJson([
                                    "code" => "404",
                                    "message" => "No records found"
                                  ]);
          }
      } // /md: showItemKits ..

      public function updateStoreConfigInvoice($request , $response)
      {

                      $enable_invoice = $request->getParam('enable_invoice') ?? $data['enable_invoice'] ;
                      $sales_invoice_formate = $request->getParam('sales_invoice_formate') ?? $data['sales_invoice_formate'] ;
                      $receiving_invoice_formate = $request->getParam('receiving_invoice_formate') ?? $data['receiving_invoice_formate'] ;
                      $default_invoice_comments = $request->getParam('default_invoice_comments') ?? $data['default_invoice_comments'] ;
                      $invoice_email_template = $request->getParam('invoice_email_template') ?? $data['invoice_email_template'] ;
                      $updated_at = getUpdateTime();

                        $db = pdo();

                        // update the itemKit ...
                        $updateStatement = $db->update(array(
                                    'enable_invoice ' => $enable_invoice  ,
                                    'sales_invoice_formate' => $sales_invoice_formate ,
                                    'receiving_invoice_formate' => $receiving_invoice_formate,
                                    'default_invoice_comments' => $default_invoice_comments,
                                    'invoice_email_template' => $invoice_email_template,
                                    'updated_at' => $updated_at
                                    ))
                                    ->table('store_config_invoice')
                                    ->where('sc_invoice_id' , '=' ,1);

                        $updateStatement->execute();

                        $db = null;


                        return $response->withHeader('Content-Type' , 'application/json')
                                    ->withJson([
                                        'code' => '204',
                                        'message' => ' Record updated  successfully .']);

      }// /md: updateItemKit



} // /ctrl:ItemKit
