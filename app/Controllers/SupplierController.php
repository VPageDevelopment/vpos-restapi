<?php

  namespace App\Controllers;

  class SupplierController
  {
      public function showSuppliers($request , $response)
      {   

        $db = pdo();
        $selectSuppliers = $db->select()->from('supplier');
        $stmt = $selectSuppliers->execute();
        $data = $stmt->fetchAll();
        $db = null;

     if($data != null){
        return $response->withHeader('Content-Type' , 'application/json' , 'JSON_UNESCAPED_UNICODE')
                        ->withJson(["suppliers" => $data]);
      } else {

        return $response->withHeader('Content-Type','application/json')
                        ->withJson([
                                    "code" => "404",
                                    "message" => "No records found"
                                  ]);
          } 
      } // /md: showSuppliers .. 

      public function showSupplier($request , $response , $arg){
        $supplier_id = $arg['id'];
        $db = pdo();
        // select that particular users
        $selectStatement = $db->select()->from('supplier')->where('supplier_id' , '=' , $supplier_id);
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

      } // /md: showSupplier ...  


      public function addSupplier($request , $response){

                $company_name = $request->getParam('company_name');
                $agency_name = $request->getParam('agency_name');
                $first_name = $request->getParam('first_name');
                $last_name = $request->getParam('last_name');
                $gender = $request->getParam('gender');
                $email = $request->getParam('email');
                $phone_number = $request->getParam('phone_number');
                $address_one = $request->getParam('address_one');
                $address_two = $request->getParam('address_two');
                $city = $request->getParam('city');
                $state = $request->getParam('state');
                $zip = $request->getParam('zip');
                $country = $request->getParam('country');
                $comments = $request->getParam('comments');
                $account = $request->getParam('account');
         

                // create a new instance of slim\pdo by calling the pdo ...
                $db = pdo();
                
                // insert into supplier table 
                $insertStatment = $db->insert(array(
                'company_name','agency_name',
                'first_name','last_name','gender','email',
                'phone_number','address_one','address_two',
                'city','state','zip','country','comments','account'
                ))
                ->into('supplier')
                ->values(array(
                $company_name , $agency_name ,
                $first_name , $last_name , $gender , $email ,
                $phone_number , $address_one , $address_two ,
                $city , $state , $zip , $country , $comments , $account 
                ));

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
                }


      } // /md: addSupplier


      public function updateSupplier($request , $response , $arg){
                    
                    $supplier_id = $arg['id'];
                    $db = pdo();
                    
                    // select that particular users
                    $selectStatement = $db->select()
                                                ->from('supplier')
                                                ->where('supplier_id' , '=' ,$supplier_id);
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
                                "message" => "No valid user found"]); 
                        };


                        $company_name =
                                $request->getParam('company_name')  ?? $data['company_name'] ;

                        $agency_name =
                                $request->getParam('agency_name')  ?? $data['agency_name'] ;

                        $first_name =
                                $request->getParam('first_name')  ?? $data['first_name'] ;
                        $last_name = 
                                $request->getParam('last_name')  ?? $data['last_name'];
                        $gender =
                                $request->getParam('gender')  ?? $data['gender'];
                        $email = 
                                $request->getParam('email')  ?? $data['email'];
                        $phone_number = 
                                $request->getParam('phone_number')  ?? $data['phone_number'];
                        $address_one = 
                                $request->getParam('address_one')  ?? $data['address_one'];
                        $address_two = 
                                $request->getParam('address_two')  ?? $data['address_two'];
                        $city = 
                                $request->getParam('city')  ?? $data['city'];
                        $state = 
                                $request->getParam('state')  ?? $data['state'];
                        $zip = 
                                $request->getParam('zip')  ?? $data['zip'];
                        
                        $comments = 
                                $request->getParam('comments')  ?? $data['comments'];
                 
                        $account = 
                                $request->getParam('account')  ?? $data['account'];
                        
                        $db = pdo();
                    
                        // update the supplier ...
                        $updateStatement = $db->update(array(
                                    'company_name' => $company_name ,
                                    'agency_name' => $agency_name ,
                                    'first_name' => $first_name ,
                                    'last_name'  => $last_name ,
                                    'gender' => $gender ,
                                    'email' => $email ,
                                    'phone_number' => $phone_number ,
                                    'address_one' => $address_one ,
                                    'address_two' => $address_two ,
                                    'city' => $city ,
                                    'state' => $state ,
                                    'zip' => $zip ,
                                    'comments' => $comments,
                                    'account'=> $account
                                    
                                    ))
                                    ->table('supplier')
                                    ->where('supplier_id', '=', $supplier_id);

                        $updateStatement->execute();

                        $db = null;

                    
                            return $response->withHeader('Content-Type' , 'application/json')
                                    ->withJson([ 
                                        'code' => '200', 
                                        'message' => ' update  supplier  successfully .']);

      }// /md: updateSupplire


      public function deleteSupplier($request , $response , $arg){

                $supplier_id = $arg['id'];
                $db = pdo();

                // select that particular users
                $selectStatement = $db->select()
                                        ->from('supplier')
                                        ->where('supplier_id' , '=' ,$supplier_id);
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
                                        ->from('supplier')
                                        ->where('supplier_id', '=', $supplier_id);

                $delete = $deleteSupplier->execute();

                $db = null;

       
                return $response->withHeader('Content-Type' , 'application/json')
                        ->withJson([ 
                                'code' => '200', 
                                'message' => ' supplier deleted successfully .']);
        }// /md: delete the supplier ...

} // /ctrl:Supplier

