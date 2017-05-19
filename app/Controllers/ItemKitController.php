<?php

  namespace App\Controllers;

  class ItemKitController
  {
      public function showItemKits($request , $response)
      {

        $db = pdo();
        $selectItemKits = $db->select()->from('item_kits');
        $stmt = $selectItemKits->execute();
        $data = $stmt->fetchAll();
        $db = null;

     if($data != null){
            return $response->withHeader('Content-Type' , 'application/json')
                            ->withJson([
                                "status" => "true",
                                "status-code" => "200",
                                "itemKits" => $data]);
      } else {

          return $response
                          ->withHeader('Content-Type','application/json')
                          ->withJson([
                                    "status" => "false",
                                    "status-code" => "404",
                                    "message" => "No records found"
                                  ]);
          }
      } // /md: showItemKits ..

      public function showItemKit($request , $response , $arg){
        $item_kit_id = $arg['id'];
        $db = pdo();
        // select that particular users
        $selectStatement = $db->select()->from('item_kits')->where('item_kit_id' , '=' , $item_kit_id);
        $stmt = $selectStatement->execute();
        $data = $stmt->fetch();
        $db = null;



        if($data != null){
            return $response->withHeader('Content-Type', 'application/json')
                            ->withJson([
                                "status" => "true",
                                "status-code" => "200",
                                "itemKit" => $data ]);

        }else{

            return $response->withHeader('Content-Type','application/json')
                            ->withJson([
                                "status" => "false",
                                "status-code" => "404",
                                "message" => "No valid user found"]);

        } // /stmt. else

      } // /md: showItemKit ...


      public function addItemKit($request , $response){

                $item_kit_name = $request->getParam('item_kit_name');
                $item_kit_desc = $request->getParam('item_kit_desc');
                $item_fk = $request->getParam('item_fk');

                // create a new instance of slim\pdo by calling the pdo ...
                $db = pdo();

                // insert into itemKit table
                $insertStatment = $db->insert(array(
                'item_kit_name','item_kit_desc',
                 'item_fk'
                ))
                ->into('item_kits')
                ->values(array(
                $item_kit_name , $item_kit_desc  ,
                $item_fk
                ));

                $insertStatment->execute();

                if($insertStatment->execute()){
                    return $response->withHeader('Content-Type' , 'application/json')
                                    ->withJson([
                                          'status' => 'true',
                                          'status-code' => '200',
                                          'message' => ' New item kit is  created successfully .']);
                }else{
                return $response->withHeader('Content-Type' , 'application/json')
                                ->withJson([
                                    'status' => 'false',
                                    'status-code' => '500',
                                    'message' => 'Sorry Error Occurs ..']);
                }


      } // /md: addItemKit


      public function updateItemKit($request , $response , $arg){

                    $item_kit_id = $arg['id'];
                    $db = pdo();

                    // select that particular users
                    $selectStatement = $db->select()
                                                ->from('item_kits')
                                                ->where('item_kit_id' , '=' ,$item_kit_id);
                        $stmt = $selectStatement
                                    ->execute();

                        $db = null;

                        $data = $stmt
                                    ->fetch();

                        // check the is already exist or not ...$_COOKIE

                        if($data == null){

                                return $response->withHeader('Content-Type','application/json')
                                                ->withJson([
                                                    "status" => "false",
                                                    "status-code" => "404",
                                                    "message" => "No valid user found"]);
                        };


                        $item_kit_name = $request->getParam('item_kit_name') ?? $data['item_kit_name'] ;
                        $item_kit_desc = $request->getParam('item_kit_desc') ?? $data['item_kit_desc'] ;
                        $item_fk = $request->getParam('item_fk') ?? $data['item_fk'] ;
                        $updated_at = getUpdateTime();

                        $db = pdo();

                        // update the itemKit ...
                        $updateStatement = $db->update(array(
                                    'item_kit_name' => $item_kit_name ,
                                    'item_kit_desc' => $item_kit_desc ,
                                    'item_fk' => $item_fk,
                                    'updated_at' => $updated_at

                                    ))
                                    ->table('item_kits')
                                    ->where('item_kit_id', '=', $item_kit_id);

                        $updateStatement->execute();

                        $db = null;


                            return $response->withHeader('Content-Type' , 'application/json')
                                            ->withJson([
                                                'status' => 'true',
                                                'status-code' => '200',
                                                'message' => ' updated item kit record successfully .']);

      }// /md: updateItemKit


      public function deleteItemKit($request , $response , $arg){

                $item_kit_id = $arg['id'];
                $db = pdo();

                // select that particular users
                $selectStatement = $db->select()
                                        ->from('item_kits')
                                        ->where('item_kit_id' , '=' ,$item_kit_id);
                $stmt = $selectStatement
                        ->execute();

                $data = $stmt
                        ->fetch();

                // check the user is exist or not ...

                if($data == null){

                        return $response->withHeader('Content-Type','application/json')
                                        ->withJson([
                                            "status" => "false",
                                            "status-code" => "404",
                                            "message" => "No valid record found"]);
                }


                $deleteItemKit = $db->delete()
                                          ->from('item_kits')
                                          ->where('item_kit_id' , '=' ,$item_kit_id);

                $delete = $deleteItemKit->execute();

                $db = null;


                return $response->withHeader('Content-Type' , 'application/json')
                                ->withJson([
                                'status' => 'true',
                                'status-code' => '204',
                                'message' => ' records deleted successfully .']);
        }// /md: delete the itemKit ...

} // /ctrl:ItemKit
