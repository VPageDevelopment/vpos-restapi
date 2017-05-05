<?php

  namespace App\Controllers;

  class StoreConfigMailController
  {
      public function viewStoreConfigMail($request , $response)
      {
        $db = pdo();
        $selectStoreConfig = $db->select()->from('store_config_mail');
        $stmt = $selectStoreConfig->execute();
        $data = $stmt->fetchAll();
        $db = null;

     if($data != null){
        return $response->withHeader('Content-Type' , 'application/json')
                        ->withJson(["Store Config Mail" => $data]);
      } else {

        return $response->withHeader('Content-Type','application/json')
                        ->withJson([
                                    "code" => "404",
                                    "message" => "No records found"
                                  ]);
          }
      } // /md: showItemKits ..

      public function updateStoreConfigMail($request , $response)
      {
                      $db = pdo();
                      $selectStoreConfig = $db->select()->from('store_config_mail')
                                                        ->where('sc_mail_id' , '=' ,1);
                      $stmt = $selectStoreConfig->execute();
                      $data = $stmt->fetchAll();

                      $protocol = $request->getParam('protocol') ?? $data['protocol'] ;
                      $path_to_sendmail = $request->getParam('path_to_sendmail') ?? $data['path_to_sendmail'] ;
                      $smpt_server = $request->getParam('smpt_server') ?? $data['smpt_server'] ;
                      $smpt_port = $request->getParam('smpt_port') ?? $data['smpt_port'] ;
                      $smpt_encryption = $request->getParam('smpt_encryption') ?? $data['smpt_encryption'] ;
                      $smpt_timeout = $request->getParam('smpt_timeout') ?? $data['smpt_timeout'] ;
                      $smpt_username = $request->getParam('smpt_username') ?? $data['smpt_username'] ;
                      $smpt_password = $request->getParam('smpt_password') ?? $data['smpt_password'] ;
                      $updated_at = getUpdateTime();

                        $db = pdo();

                        // update the itemKit ...
                        $updateStatement = $db->update(array(
                                    'protocol ' => $protocol  ,
                                    'path_to_sendmail' => $path_to_sendmail ,
                                    'smpt_server' => $smpt_server,
                                    'smpt_port' => $smpt_port,
                                    'smpt_encryption' => $smpt_encryption,
                                    'smpt_timeout' => $smpt_timeout,
                                    'smpt_username' => $smpt_username,
                                    'smpt_password' => $smpt_password,
                                    'updated_at' => $updated_at
                                    ))
                                    ->table('store_config_mail')
                                    ->where('sc_mail_id' , '=' ,1);

                        $updateStatement->execute();

                        $db = null;


                        return $response->withHeader('Content-Type' , 'application/json')
                                    ->withJson([
                                        'code' => '204',
                                        'message' => ' Record updated  successfully .']);

      }// /md: updateItemKit



} // /ctrl:ItemKit
