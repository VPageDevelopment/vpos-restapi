<?php

  namespace App\Controllers;

  class itemController {


      public function showItems($request , $response){
                $db = pdo();
                $selectItems = $db->select()->from('items');
                $stmt = $selectItems->execute();
                $data = $stmt->fetchAll();
                $db = null;



                if($data != null){
                return $response->withHeader('Content-Type' , 'application/json')
                                ->withJson(["customers" => $data]);
            } else {

                return $response->withHeader('Content-Type','application/json')
                                ->withJson([
                                            "code" => "404",
                                            "message" => "No records found"
                                        ]);

            } // /stmt. else

      } // /md: showItems


      public function showItem($request, $response, $arg){
          
            $item_id = $arg['id'];
            $db = pdo();
            // select that particular users
            $selectStatement = $db->select()->from('items')->where('item_id' , '=' , $item_id);
            $stmt = $selectStatement->execute();
            $data = $stmt->fetch();
            $db = null;

            

            if($data != null){

                    return $response->withJson(["message" => $data ]);

            }else{

                return $response->withHeader('Content-Type','application/json')
                ->withJson([
                "code" => "404",
                "message" => "No valid user found"]);

            } // /stmt. else
      } // /md:showItem


      public function addItem($request , $response){
            $upc_ean_isbn = $request->getParam('upc_ean_isbn');
            $item_name = $request->getParam('item_name');
            $category = $request->getParam('category');
      }
      
  }// /ctrl:item
