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
                    return $response
                        ->withHeader('Content-Type' , 'application/json')
                        ->withJson([
                            "items" => $data,
                            "status-code" => "200",
                            "status" => "true",
                        ]);
            } else {

                return $response->withHeader('Content-Type','application/json')
                                ->withJson([
                                            "status-code" => "404",
                                            "message" => "No records found",
                                            "status" => "false"
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

                return $response
                            ->withHeader('Content-Type', 'application/json')
                            ->withJson([
                                "item" => $data,
                                "status-code" => "200",
                                "status" => "true"
                            ]);

            }else{

                return $response
                            ->withHeader('Content-Type','application/json')
                            ->withJson([
                                "status-code" => "404",
                                "message" => "No item found",
                                "status" => "false"
                            ]);

            } // /stmt. else
      } // /md:showItem:


      public function addItem($request, $response){

                    $upc_ean_isbn = $request->getParam('upc_ean_isbn');
                    $item_name = $request->getParam('item_name');
                    $category = $request->getParam('category');
                    $supplier_fk = $request->getParam('supplier_fk');
                    $cost_price = $request->getParam('cost_price');
                    $retail_price = $request->getParam('retail_price');
                    $tax_one = $request->getParam('tax_one');
                    $tax_two = $request->getParam('tax_two');
                    $quantity_stock = $request->getParam('quantity_stock');
                    $receiving_quantity = $request->getParam('receiving_quantity');
                    $description = $request->getParam('description');
                    $allow_alt_description = $request->getParam('allow_alt_description');
                    $item_has_serial_number = $request->getParam('item_has_serial_number');
                    $deleted = $request->getParam('deleted');

                    $avatar = $request->getUploadedFiles()['avatar'];

                    $upload_path = __DIR__."/../uploads/images/";

                    $uploadFileName = $avatar->getClientFilename();

                    //uploaded image size
                    $uploadedImageSize = $avatar->getSize();

                    //uploade media type
                    $uploadeImageMediaType = $avatar->getClientMediaType();

                    $full_img_path = $upload_path.$uploadFileName ;

                    if(empty($avatar)){
                        $response
                            ->withHeader('Content-Type', 'application/json')
                             ->withJson([
                                   'status-code' => '404',
                                   'message' => 'Expected a item avatar',
                                   'status'=>'false'
                                      ]);
                        return $response;
                    }

                    // image validations...

                    if(in_array($uploadedImageMediaType, array('jpg','png','png'))){
                        //  chech the image size less than 5M
                        if($uploadedImageSize < 5000000){
                            if($avatar->getError() === UPLOAD_ERR_OK) $avatar->moveTo($full_img_path);
                        }else{
                             $response
                                 ->withHeader('Content-Type', 'application/json')
                                 ->withJson([
                                    'status-code' => '503',
                                    'message' =>'uploaded image size is too big.',
                                    'status' => 'false'
                                ]);
                             return $response;
                        }
                    }else{
                            $response
                                ->withHeader('Content-Type', 'application/json')
                                ->withJson([
                                    'status' =>'false',
                                    'status-code' => '503',
                                    'message' =>'uploaded image media type must be jpg or jpeg or png.'
                                        ]);
                            return $response;
                        }



                    // die();

                    // create a new instance of slim\pdo by calling the pdo ...
                    $db = pdo();

                    // insert into customer table
                    $insertStatment = $db->insert(array(
                      'upc_ean_isbn','item_name','category','supplier_fk',
                      'cost_price','retail_price','tax_one',
                      'tax_two','quantity_stock','receiving_quantity','description','avatar',
                      'allow_alt_description','item_has_serial_number','deleted'
                    ))
                    ->into('items')
                    ->values(array(
                      $upc_ean_isbn , $item_name , $category , $supplier_fk ,
                      $cost_price , $retail_price , $tax_one ,
                      $tax_two , $quantity_stock , $receiving_quantity , $description , $full_img_path,
                      $allow_alt_description , $item_has_serial_number , $deleted
                    ));

                    $insertStatment->execute();

                    if($insertStatment->execute()){
                        return $response
                                   ->withHeader('Content-Type' , 'application/json')
                                   ->withJson([
                                      'status'=>'true',
                                      'status-code' => '201',
                                      'message' => ' New Customer created successfully .']);
                    }else{
                      return $response->withHeader('Content-Type' , 'application/json')
                          ->withJson([
                                  'status' => 'false',
                                  'code' => '500',
                                  'message' => 'Sorry Error Occurs ..']);
                    }


     }// /md:addItem




     public function updateItem($request , $response , $arg){

                   $item_id = $arg['id'];
                   $db = pdo();

                   // select that particular users
                   $selectStatement = $db->select()
                                               ->from('items')
                                               ->where('item_id' , '=' ,$item_id);
                       $stmt = $selectStatement
                                   ->execute();

                       $db = null;

                       $data = $stmt
                                   ->fetch();

                       // check the is already exist or not ...$_COOKIE

                       if($data == null){

                           return $response
                                      ->withHeader('Content-Type','application/json')
                                      ->withJson([
                                            "status" => "false",
                                            "status-code" => "404",
                                            "message" => "No valid item found"]);
                       };

                       $upc_ean_isbn = $request->getParam('upc_ean_isbn') ?? $data['upc_ean_isbn'] ;
                       $item_name = $request->getParam('item_name') ?? $data['item_name'] ;
                       $category = $request->getParam('category') ?? $data['category'] ;
                       $supplier_fk = $request->getParam('supplier_fk') ?? $data['supplier_fk'] ;
                       $cost_price = $request->getParam('cost_price') ?? $data['cost_price'] ;
                       $retail_price = $request->getParam('retail_price') ?? $data['retail_price'] ;
                       $tax_one = $request->getParam('tax_one') ?? $data['tax_one'] ;
                       $tax_two = $request->getParam('tax_two') ?? $data['tax_two'] ;
                       $quantity_stock = $request->getParam('quantity_stock') ?? $data['quantity_stock'] ;
                       $receiving_quantity = $request->getParam('receiving_quantity') ?? $data['receiving_quantity'] ;
                       $description = $request->getParam('description') ?? $data['description'] ;
                       $allow_alt_description = $request->getParam('allow_alt_description') ?? $data['allow_alt_description'] ;
                       $item_has_serial_number = $request->getParam('item_has_serial_number') ?? $data['item_has_serial_number'] ;
                       $deleted = $request->getParam('deleted') ?? $data['deleted'];


                       $avatar = $request->getUploadedFiles()['avatar'];


                       if($avatar != null){
                            $upload_path = __DIR__."/../uploads/images/";

                            $uploadFileName = $avatar->getClientFilename();

                            //uploaded image size
                            $uploadedImageSize = $avatar->getSize();

                            //uploade media type
                            $uploadeImageMediaType = $avatar->getClientMediaType();

                            $full_img_path = $upload_path.$uploadFileName ;

                           // image validations...

                            if(in_array($uploadedImageMediaType, array('jpg','png','png'))){
                                //  chech the image size less than 5M
                                if($uploadedImageSize < 5000000){

                                    unlink($full_img_path);
                                    if($avatar->getError() === UPLOAD_ERR_OK) $avatar->moveTo($full_img_path);
                                }else{
                                    return $response->withHeader('Content-Type', 'application/json')
                                        ->withJson([
                                                  'status' => 'false',
                                                  'status-code' => '503',
                                                  'message' =>'uploaded image size is too big.'
                                                ]);

                                }
                            }else{
                                    return $response->withHeader('Content-Type', 'application/json')
                                        ->withJson([
                                                  'status' => 'false',
                                                  'status-code' => '503',
                                                  'message' =>'uploaded image media type must be jpg or jpeg or png.'
                                                ]);

                                }


                       }else{
                         $full_img_path = $data['avatar'];
                       }




                       $updated_at = getUpdateTime();
                       $db = pdo();

                       // update the itemKit ...
                       $updateStatement = $db->update(array(
                                   'upc_ean_isbn' => $upc_ean_isbn ,
                                   'item_name' => $item_name ,
                                   'category' => $category ,
                                   'supplier_fk' => $supplier_fk,
                                   'cost_price' => $cost_price,
                                   'retail_price' => $retail_price,
                                   'tax_one' => $tax_one,
                                   'tax_two' => $tax_two,
                                   'quantity_stock' => $quantity_stock,
                                   'receiving_quantity' => $receiving_quantity,
                                   'description' => $description,
                                   'avatar' => $full_img_path,
                                   'allow_alt_description' => $allow_alt_description,
                                   'item_has_serial_number' => $item_has_serial_number,
                                   'deleted' => $deleted,
                                   'updated_at'=> $updated_at

                                   ))
                                   ->table('items')
                                   ->where('item_id', '=', $item_id);

                       $updateStatement->execute();

                       $db = null;


                           return $response->withHeader('Content-Type' , 'application/json')
                               ->withJson([
                                       'status' => 'true',
                                       'status-code' => '200',
                                       'message' => ' updated item record successfully .']);

     }// /md: updateItemKit


     // delete that item ...
     public function deleteItem($request , $response , $arg){

               $item_id = $arg['id'];
               $db = pdo();

               // select that particular users
               $selectStatement = $db->select()
                                       ->from('items')
                                       ->where('item_id' , '=' ,$item_id);
               $stmt = $selectStatement
                       ->execute();

               $data = $stmt
                       ->fetch();

               // check the user is exist or not ...

               if($data == null){

                   return $response
                              ->withHeader('Content-Type','application/json')
                              ->withJson([
                                    "status" => "false",
                                    "status-code" => "404",
                                    "message" => "No valid record found"]);
               }


               $deleteItemKit = $db->delete()
                                         ->from('items')
                                         ->where('item_id' , '=' ,$item_id);

               $delete = $deleteItemKit->execute();

               $db = null;


               return $response
                       ->withHeader('Content-Type' , 'application/json')
                       ->withJson([
                               'status' => 'true',
                               'status-code' => '204',
                               'message' => ' record deleted successfully .']);
       }// /md: delete the itemKit ...




  }// /ctrl:item
