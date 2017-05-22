<?php

  namespace App\Controllers;

  class StoreConfigController
  {
      public function viewStoreConfigInfo($request , $response)
      {
        $db = pdo();
        $selectStoreConfig = $db->select()->from('store_config');
        $stmt = $selectStoreConfig->execute();
        $data = $stmt->fetchAll();
        $db = null;

     if($data != null){
        return $response->withHeader('Content-Type' , 'application/json')
                        ->withJson([
                                "status" => "true",
                                "status_code" => "200",
                                "Store Config Information" => $data]);
      } else {

        return $response->withHeader('Content-Type','application/json')
                        ->withJson([
                                    "status" => "false",
                                    "status_code" => "404",
                                    "message" => "No records found"
                                  ]);
          }
      } // /md: showStoreConfigs ..




      public function updateStoreConfigInfo($request , $response)
      {

                        $company_name = $request->getParam('company_name') ?? $data['company_name'] ;
                        $company_logo = $request->getParam('company_logo') ?? $data['company_logo'] ;
                        $company_address = $request->getParam('company_address') ?? $data['company_address'] ;
                        $website = $request->getParam('website') ?? $data['website'] ;
                        $email = $request->getParam('email') ?? $data['email'] ;
                        $company_phonenumber = $request->getParam('company_phonenumber') ?? $data['company_phonenumber'] ;
                        $fax = $request->getParam('fax') ?? $data['fax'] ;
                        $return_policy = $request->getParam('return_policy') ?? $data['return_policy'] ;
                        $updated_at = getUpdateTime();

                        $db = pdo();

                        // update the StoreConfig ...
                        $updateStatement = $db->update(array(
                                    'company_name ' => $company_name  ,
                                    'company_logo' => $company_logo ,
                                    'company_address' => $company_address,
                                    'website' => $website,
                                    'email' => $email,
                                    'company_phonenumber' => $company_phonenumber,
                                    'fax' => $fax,
                                    'return_policy' => $return_policy,
                                    'updated_at' => $updated_at
                                    ))
                                    ->table('store_config')
                                    ->where('store_config_info_id' , '=' ,1);

                        $updateStatement->execute();

                        $db = null;


                        return $response->withHeader('Content-Type' , 'application/json')
                                        ->withJson([
                                            'status' => 'true',
                                            'status_code' => '204',
                                            'message' => ' Record updated  successfully .']);

      }// /md: updateStoreConfig



} // /ctrl:StoreConfig
