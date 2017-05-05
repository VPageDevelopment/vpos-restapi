<?php

  namespace App\Controllers;

  class GiftCardController
  {
      public function showGiftCards($request , $response)
      {
        $db = pdo();
        $selectGiftCards = $db->select()->from('gift_card');
        $stmt = $selectGiftCards->execute();
        $data = $stmt->fetchAll();
        $db = null;

     if($data != null){
        return $response->withHeader('Content-Type' , 'application/json')
                        ->withJson(["giftCards" => $data]);
      } else {

        return $response->withHeader('Content-Type','application/json')
                        ->withJson([
                                    "code" => "404",
                                    "message" => "No records found"
                                  ]);
          }
      } // /md: showItemKits ..

      public function showGiftCard($request , $response , $arg){

        $gift_card_id = $arg['id'];
        $db = pdo();
        // select that particular users
        $selectStatement = $db->select()->from('gift_card')->where('gift_card_id' , '=' , $gift_card_id);
        $stmt = $selectStatement->execute();
        $data = $stmt->fetch();
        $db = null;

        if($data != null){

                return $response->withJson(["giftCards" => $data ]);

        }else{

            return $response->withHeader('Content-Type','application/json')
            ->withJson([
            "code" => "404",
            "message" => "No valid user found"]);

        } // /stmt. else

      } // /md: showItemKit ...


      public function addGiftCard($request , $response){

                $gift_card_number = $request->getParam('gift_card_number');
                $gc_value = $request->getParam('gc_value');
                $customer_fk = $request->getParam('customer_fk');

                // create a new instance of slim\pdo by calling the pdo ...
                $db = pdo();

                // insert into itemKit table
                $insertStatment = $db->insert(array(
                'gift_card_number','gc_value',
                 'customer_fk'
                ))
                ->into('gift_card')
                ->values(array(
                $gift_card_number , $gc_value  ,
                $customer_fk
                ));

                $insertStatment->execute();

                if($insertStatment->execute()){
                    return $response->withHeader('Content-Type' , 'application/json')
                            ->withJson([
                                'code' => '201',
                                'message' => ' New Gift Card is  created successfully .']);
                }else{
                return $response->withHeader('Content-Type' , 'application/json')
                            ->withJson([
                            'code' => '500',
                            'message' => 'Sorry Error Occurs ..']);
                }


      } // /md: addItemKit


      public function updateGiftCard($request , $response , $arg){

                    $gift_card_id = $arg['id'];
                    $db = pdo();
                    // select that particular users
                    $selectStatement = $db->select()
                                                ->from('gift_card')
                                                ->where('gift_card_id' , '=' ,$gift_card_id);
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

                        $gift_card_number = $request->getParam('gift_card_number') ?? $data['gift_card_number'] ;
                        $gc_value = $request->getParam('gc_value') ?? $data['gc_value'] ;
                        $customer_fk = $request->getParam('customer_fk') ?? $data['customer_fk'] ;
                        $updated_at = getUpdateTime();

                        $db = pdo();

                        // update the itemKit ...
                        $updateStatement = $db->update(array(
                                    'gift_card_number ' => $gift_card_number  ,
                                    'gc_value' => $gc_value ,
                                    'customer_fk' => $customer_fk,
                                    'updated_at' => $updated_at

                                    ))
                                    ->table('gift_card')
                                    ->where('gift_card_id' , '=' ,$gift_card_id);

                        $updateStatement->execute();

                        $db = null;


                            return $response->withHeader('Content-Type' , 'application/json')
                                    ->withJson([
                                        'code' => '200',
                                        'message' => ' Record updated  successfully .']);

      }// /md: updateItemKit


      public function deleteGiftCard($request , $response , $arg){

                $gift_card_id = $arg['id'];
                $db = pdo();

                // select that particular users
                $selectStatement = $db->select()
                                        ->from('gift_card')
                                        ->where('gift_card_id' , '=' ,$gift_card_id);
                $stmt = $selectStatement
                        ->execute();

                $data = $stmt
                        ->fetch();

                // check the user is exist or not ...

                if($data == null){
                        return $response->withHeader('Content-Type','application/json')
                        ->withJson([
                        "code" => "404",
                        "message" => "No valid record found"]);
                }

                $deleteItemKit = $db->delete()
                                          ->from('gift_card')
                                          ->where('gift_card_id' , '=' ,$gift_card_id);
                $delete = $deleteItemKit->execute();
                $db = null;
                return $response->withHeader('Content-Type' , 'application/json')
                        ->withJson([
                                'code' => '204',
                                'message' => ' records deleted successfully .']);
        }// /md: delete the itemKit ...

} // /ctrl:ItemKit
