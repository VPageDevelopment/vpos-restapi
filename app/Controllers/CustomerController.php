<?php

  namespace App\Controllers;

  use \Psr\Http\Message\{
      ServerRequestInterface as Request ,
      ResponseInterface as Response };



  class CustomerController
  {

    //  show all customer ...
    public function customers( Request $request , Response $response )
    {
        // calling the pdo function to create a new instance of pdo ...
        $db = pdo();

        $selectCustomers = $db->select()->from('customer');

        $stmt = $selectCustomers->execute();
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

    } // /fn. customers.. 


    // show single customer ...
    public function customer($request , $response , $arg){

      $customer_id = $arg['id'];
      $db = pdo();
      // select that particular users
      $selectStatement = $db->select()->from('customer')->where('customer_id' , '=' , $customer_id);
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

    }// /fn. customer...


    // create new customers
    public function addCustomer(Request $request , Response $response){

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
        $company = $request->getParam('company');
        $account = $request->getParam('account');
        $total = $request->getParam('total');
        $discount = $request->getParam('discount');
        $taxable = $request->getParam('taxable');

        // create a new instance of slim\pdo by calling the pdo ...
        $db = pdo();
        
        // insert into customer table 
        $insertStatment = $db->insert(array(
          'first_name','last_name','gender','email',
          'phone_number','address_one','address_two',
          'city','state','zip','country','comments',
          'company','account','total','discount','taxable'
        ))
        ->into('customer')
        ->values(array(
          $first_name , $last_name , $gender , $email ,
          $phone_number , $address_one , $address_two ,
          $city , $state , $zip , $country , $comments ,
          $company , $account , $total , $discount , $taxable
        ));

        $insertStatment->execute();

        if($insertStatment->execute()){
            return $response->withHeader('Content-Type' , 'application/json')
                      ->withJson([ 
                          'code' => '200', 
                          'message' => ' New Customer created successfully .']);
        }else{
          return $response->withHeader('Content-Type' , 'application/json')
                    ->withJson([
                      'code' => '500',
                      'message' => 'Sorry Error Occurs ..']);
        }

       
    }

    // update the

    public function updateCustomer (Request $request , Response $response , $arg) {
       $customer_id = $arg['id'];
       $db = pdo();
       
       // select that particular users
       $selectStatement = $db->select()
                                  ->from('customer')
                                  ->where('customer_id' , '=' ,$customer_id);
        $stmt = $selectStatement
                      ->execute();

        $db = null;

        $data = $stmt
                    ->fetch();



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
        $country = 
                $request->getParam('country')  ?? $data['country'];
        $comments = 
                $request->getParam('comments')  ?? $data['comments'];
        $company = 
                $request->getParam('company')  ?? $data['company'];
        $account = 
                $request->getParam('account')  ?? $data['account'];
        $total = 
                $request->getParam('total')  ?? $data['total'];
        $discount = 
                $request->getParam('discount')  ?? $data['discount'];
        $taxable = 
                $request->getParam('taxable')  ?? $data['taxable'];

        $db = pdo();
       
        // update the customer ...
        $updateStatement = $db->update(array(
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
                       'country' => $country ,
                       'comments' => $comments,
                       'company' => $company ,
                       'account'=> $account,
                       'total'=> $total,
                       'discount' => $discount,
                       'taxable' => $taxable
                       ))
                       ->table('customer')
                       ->where('customer_id', '=', $customer_id);

        $update = $updateStatement->execute();

        $db = null;
        try {
            return $response->withHeader('Content-Type' , 'application/json')
                      ->withJson([ 
                          'code' => '200', 
                          'message' => ' update created successfully .']);

        }catch(PDOException $e) {
          return $response->withHeader('Content-Type' , 'application/json')
                    ->withJson([
                      'code' => '500',
                      'message' => 'Internal Server Error']);
        }


    } // /fn. updateCustomer 

    // delete customer ...
    public function deleteCustomer(Request $request , Response $response , $arg){
        
        $customer_id = $arg['id'];

        $db = pdo();

        $deleteCustomer = $db->delete()
                                ->from('customer')
                                ->where('customer_id', '=', $customer_id);

        $deleteCustomer->execute();

        try{
            return $response->withHeader('Content-Type' , 'application/json')
                      ->withJson([ 
                          'code' => '200', 
                          'message' => ' customer deleted successfully .']);
        }catch(PDOException $e ){
             return $response->withHeader('Content-Type' , 'application/json')
                    ->withJson([
                      'code' => '500',
                      'message' => 'Internal Server Error']);

        }

    }// /fn. delete the customer ...


  } // /ctrl. CustomerCtrl 
