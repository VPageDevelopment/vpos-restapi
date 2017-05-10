<?php

  namespace App\Controllers;


  class EmployeeLoginController
  {

    //  show all customer ...
    public function showEmployeesLogin($request ,$response)
    {
        // calling the pdo function to create a new instance of pdo ...
        $db = pdo();
        $selectEmployees = $db->select()->from('employee_login');
        $stmt = $selectEmployees->execute();
        $data = $stmt->fetchAll();
        $db = null;

        if($data != null){
        return $response->withHeader('Content-Type' , 'application/json')
                        ->withJson(["EmployeesLogins" => $data]);
      } else {

        return $response->withHeader('Content-Type','application/json')
                        ->withJson([
                                    "code" => "404",
                                    "message" => "No records found"
                                  ]);

      } // /stmt. else

    } // /md: customers..

    // show single customer ...
    public function showEmployeeLogin($request , $response , $arg){

      $employee_fk = $arg['id'];
      $db = pdo();
      // select that particular users
      $selectStatement = $db->select()->from('employee_login')->where('employee_fk' , '=' , $employee_fk);
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
    public function addEmployeeLogin($request,$response){

        $employee_fk = $request->getParam('employee_fk');
        $user_name = $request->getParam('user_name');
        $password = $request->getParam('password');

        $hashPassword = hashPassword($password);

        $db = pdo();


        // to the check the credentials is already is created ....
        $userStatament = $db->select()
                                    ->from('employee_login')
                                    ->where('user_name' , '=' , $user_name);

        $user = $userStatament->execute();
        $isUserNameExist = $user->fetch();
        if($isUserNameExist != null){
          return $response->withHeader('Content-Type' , 'application/json')
                    ->withJson([
                        'code' => '200',
                        'message' => 'Username is already taken . New someother name..']);
        }


        // to the check the credentials is already is created ....
        $selectStatament = $db->select()
                                    ->from('employee_login')
                                    ->where('employee_fk' , '=' , $employee_fk);

        $stmt = $selectStatament->execute();
        $isCrendentialExist = $stmt->fetch();

        if($isCrendentialExist != null){
          return $response->withHeader('Content-Type' , 'application/json')
                    ->withJson([
                        'code' => '200',
                        'message' => ' The credentials  for this employee is already exist.']);
        }


        // insert into customer table
        $insertStatment = $db->insert(array(
          'employee_fk','user_name','password'
        ))
        ->into('employee_login')
        ->values(array(
          $employee_fk , $user_name , $hashPassword
        ));

        $insertStatment->execute();

        if($insertStatment->execute()){
            return $response->withHeader('Content-Type' , 'application/json')
                      ->withJson([
                          'code' => '200',
                          'message' => ' New employee credentials is created successfully .']);
        }else{
          return $response->withHeader('Content-Type' , 'application/json')
                    ->withJson([
                      'code' => '500',
                      'message' => 'Sorry Error Occurs ..']);
        };


    }

    // update the

    public function updateEmployeeLogin ($request, $response, $arg) {

       $employee_fk = $arg['id'];

       $db = pdo();

       // select that particular users
       $selectStatement = $db->select()
                                  ->from('employee_login')
                                  ->where('employee_fk' , '=' ,$employee_fk);
        $stmt = $selectStatement
                      ->execute();

        $db = null;

        $data = $stmt
                    ->fetchAll();

        // check the is already exist or not ...$_COOKIE
        if( $data == null ){

                return $response->withHeader('Content-Type','application/json')
                ->withJson([
                "code" => "404",
                "message" => "No valid employee found"]);
         };


         $user_name = $request->getParam('user_name') ?? $data['user_name'] ;
         $password = $request->getParam('password') ?? $data['password'];
         $hashPassword = hashPassword($password);
         $updated_at = getUpdateTime();


        $db = pdo();

        // update the customer ...
        $updateStatement = $db->update(array(
                       'employee_fk' => $employee_fk,
                       'user_name'  => $user_name,
                       'password' => $hashPassword,
                       'updated_at' => $updated_at
                       ))
                       ->table('employee_login')
                       ->where('employee_fk' , '=' ,$employee_fk);

         $updateStatement->execute();

        $db = null;

        return $response->withHeader('Content-Type' , 'application/json')
                        ->withJson([
                          'code' => '200',
                          'message' => ' updated records successfully .'
                        ]);



    } // /md: updateCustomer

    // delete customer ...
    public function deleteEmployeeLogin($request, $response, $arg){

                $employee_fk = $arg['id'];

                $db = pdo();

                // select that particular users
                $selectStatement = $db->select()
                                        ->from('employee_login')
                                        ->where('employee_fk' , '=' ,$employee_fk);
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
                                        ->from('employee_login')
                                        ->where('employee_fk', '=', $employee_fk);

                $delete = $deleteCustomer->execute();
                $db = null;

                return $response->withHeader('Content-Type' , 'application/json')
                        ->withJson([
                                'code' => '204',
                                'message' => ' employee deleted successfully .']);

        }// /md: delete the customer ...


  } // /ctrl:Customer
