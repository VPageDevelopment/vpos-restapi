<?php

  namespace App\Controllers;

  use \Psr\Http\Message\{
      ServerRequestInterface as Request ,
      ResponseInterface as Response };

  class EmployeeController
  {

    //  show all customer ...
    public function showEmployees( Request $request , Response $response)
    {
        // calling the pdo function to create a new instance of pdo ...
        $db = pdo();
        $selectEmployees = $db->select()->from('employee');
        $stmt = $selectEmployees->execute();
        $data = $stmt->fetchAll();
        $db = null;

        if($data != null){
        return $response->withHeader('Content-Type' , 'application/json')
                        ->withJson(["Employees" => $data]);
      } else {

        return $response->withHeader('Content-Type','application/json')
                        ->withJson([
                                    "code" => "404",
                                    "message" => "No records found"
                                  ]);

      } // /stmt. else

    } // /md: customers..

    // show single customer ...
    public function showEmployee($request , $response , $arg){

      $employee_id = $arg['id'];
      $db = pdo();
      // select that particular users
      $selectStatement = $db->select()->from('employee')->where('employee_id' , '=' , $employee_id);
      $stmt = $selectStatement->execute();
      $data = $stmt->fetch();
      $db = null;

      if($data != null){
            return $response->withJson(["Employee" => $data ]);
      }else{

        return $response->withHeader('Content-Type','application/json')
        ->withJson([
          "code" => "404",
          "message" => "No valid user found"]);

      } // /stmt. else

    }// /md: customer...


    // create new customers
    public function addEmployee(Request $request , Response $response){

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

        // create a new instance of slim\pdo by calling the pdo ...
        $db = pdo();

        // insert into customer table
        $insertStatment = $db->insert(array(
          'first_name','last_name','gender','email',
          'phone_number','address_one','address_two',
          'city','state','zip','country','comments'
        ))
        ->into('employee')
        ->values(array(
          $first_name , $last_name , $gender , $email ,
          $phone_number , $address_one , $address_two ,
          $city , $state , $zip , $country , $comments
        ));

        $insertStatment->execute();

        if($insertStatment->execute()){
            return $response->withHeader('Content-Type' , 'application/json')
                      ->withJson([
                          'code' => '200',
                          'message' => ' New Employee created successfully .']);
        }else{
          return $response->withHeader('Content-Type' , 'application/json')
                    ->withJson([
                      'code' => '500',
                      'message' => 'Sorry Error Occurs ..']);
        };


    }

    // update the

    public function updateEmployee (Request $request , Response $response , $arg) {

       $employee_id = $arg['id'];
       $db = pdo();

       // select that particular users
       $selectStatement = $db->select()
                                  ->from('employee')
                                  ->where('employee_id' , '=' ,$employee_id);
        $stmt = $selectStatement
                      ->execute();

        $db = null;

        $data = $stmt
                    ->fetch();

        // check the is already exist or not ...$_COOKIE
        if( $data == null ){

                return $response->withHeader('Content-Type','application/json')
                ->withJson([
                "code" => "404",
                "message" => "No valid employee found"]);
         };

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

        $updated_at = getUpdateTime();


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
                       'updated_at' => $updated_at
                       ))
                       ->table('employee')
                       ->where('employee_id', '=', $employee_id);

         $updateStatement->execute();

        $db = null;

            return $response->withHeader('Content-Type' , 'application/json')
                      ->withJson([
                          'code' => '200',
                          'message' => ' updated records successfully .']);



    } // /md: updateCustomer

    // delete customer ...
    public function deleteEmployee(Request $request , Response $response , $arg){

                $employee_id = $arg['id'];

                $db = pdo();

                // select that particular users
                $selectStatement = $db->select()
                                        ->from('employee')
                                        ->where('employee_id' , '=' ,$employee_id);
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
                };

                $deleteCustomer = $db->delete()
                                        ->from('employee')
                                        ->where('employee_id', '=', $employee_id);

                $delete = $deleteCustomer->execute();
                $db = null;

                return $response->withHeader('Content-Type' , 'application/json')
                        ->withJson([
                                'code' => '200',
                                'message' => ' employee deleted successfully .']);

        }// /md: delete the customer ...


  } // /ctrl:Customer
