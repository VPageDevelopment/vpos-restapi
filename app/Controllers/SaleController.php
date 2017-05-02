<?php

namespace App\Controllers;

class SaleController
{
        public function showSales ( $request , $response){
            $db = pdo();
            $selectStatement = $db->select()->from('sales');
            $stmt = $selectStatement->execute();
            $data = $stmt->fetchAll();
            $db = null;

            if($data != null){
               return $response->withHeader('Content-Type' , 'application/json')
                               ->withJson(["sales" => $data]);
             } else {

               return $response->withHeader('Content-Type','application/json')
                               ->withJson([
                                           "code" => "404",
                                           "message" => "No records found"
                                         ]);
                 }
        } // md:showSales ...


        public function showSale($request , $response , $arg){
          $sales_id = $arg['id'] ;
          $db = pdo();
          $selectStatement = $db->select()->from('sales')
                                          ->where('sales_id' , '=' , $sales_id);
          $stmt = $selectStatement->execute();
          $data = $stmt->fetchAll();
          $db = null;

          if($data != null){
             return $response->withHeader('Content-Type' , 'application/json')
                             ->withJson(["sales" => $data]);
           } else {
              return $response->withHeader('Content-Type','application/json')
                             ->withJson([
                                         "code" => "404",
                                         "message" => "No records found"
                                       ]);
               }
        }// md:showSale ...


        public function addSales($request , $response ){

            $customer_fk = $request->getParam('customer_fk');
            $item_fk = $request->getParam('item_fk');
            $amount_due = $request->getParam('amount_due');
            $amount_tendered = $request->getParam('amount_tendered');
            $change_due = $request->getParam('change_due');
            $type = $request->getParam('type');
            $invoice = $request->getParam('invoice');

            $db = pdo();


            // insert into supplier table
            $insertStatment = $db->insert(array(
            'customer_fk','item_fk',
            'amount_due','amount_tendered','change_due','type',
            'invoice'
            ))
            ->into('sales')
            ->values(array(
            $customer_fk , $item_fk ,
            $amount_due , $amount_tendered , $change_due , $type ,
            $invoice
            ));


            $db = null;

            $insertStatment->execute();

            if($insertStatment->execute()){
                return $response->withHeader('Content-Type' , 'application/json')
                        ->withJson([
                            'code' => '200',
                            'message' => ' New supplier created successfully .']);
            }else{
            return $response->withHeader('Content-Type' , 'application/json')
                        ->withJson([
                        'code' => '500',
                        'message' => 'Sorry Error Occurs ..']);
            } // else


        } // md:addSales


        public function updateSale($request , $response , $arg){
          $sales_id = $arg['id'];
          $db = pdo();

          // select that particular users
          $selectStatement = $db->select()
                                      ->from('sales')
                                      ->where('sales_id' , '=' ,$sales_id);
              $stmt = $selectStatement
                          ->execute();

              $db = null;

              $data = $stmt
                          ->fetch();

              // check the is already exist or not ...$_COOKIE

              if($data == null){

                      return $response->withHeader('Content-Type','application/json')
                      ->withJson([
                      "code" => "404",
                      "message" => "No valid record found"]);
              };


              $customer_fk = $request->getParam('customer_fk') ?? $data['customer_fk'];
              $item_fk = $request->getParam('item_fk') ?? $data['item_fk'];
              $amount_due = $request->getParam('amount_due') ?? $data['amount_due'];
              $amount_tendered = $request->getParam('amount_tendered') ?? $data['amount_tendered'];
              $change_due = $request->getParam('change_due') ?? $data['change_due'];
              $type = $request->getParam('type') ?? $data['type'];
              $invoice = $request->getParam('invoice') ?? $data['invoice'];


              $db = pdo();

              // update the itemKit ...
              $updateStatement = $db->update(array(
                          'customer_fk' => $customer_fk ,
                          'item_fk' => $item_fk ,
                          'amount_due' => $amount_due,
                          'amount_tendered' => $amount_tendered,
                          'change_due' => $change_due,
                          'type' => $type,
                          'invoice' => $invoice

                          ))
                          ->table('sales')
                          ->where('sales_id' , '=' ,$sales_id);

              $updateStatement->execute();

              $db = null;


                  return $response->withHeader('Content-Type' , 'application/json')
                          ->withJson([
                              'code' => '200',
                              'message' => ' updated item kit record successfully .']);
        } // md : updateSales ...


        public function deleteSales($request , $response , $arg){
                  $sales_id = $arg['id'];
                  $db = pdo();
                  // select that particular users
                  $selectStatement = $db->select()
                                          ->from('sales')
                                          ->where('sales_id' , '=' ,$sales_id);
                  $stmt = $selectStatement
                          ->execute();
                  $data = $stmt
                          ->fetch();
                  // check the user is exist or not ...
                  if($data == null){
                          return $response->withHeader('Content-Type','application/json')
                          ->withJson([
                          "code" => "404",
                          "message" => "No valid user found"]);
                  }
                  $deleteSupplier = $db->delete()
                                          ->from('sales')
                                          ->where('sales_id' , '=' ,$sales_id);
                  $delete = $deleteSupplier->execute();

                  $db = null;
                  return $response->withHeader('Content-Type' , 'application/json')
                          ->withJson([
                                  'code' => '200',
                                  'message' => ' supplier deleted successfully .']);
          }// /md: deleteSales ...





} // /ctrl:SaleCtrl
