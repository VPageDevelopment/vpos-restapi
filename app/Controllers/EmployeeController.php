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
            return $response
                        ->withHeader('Content-Type' , 'application/json')
                        ->withJson([
                            "status" => "true",
                            "status_code" => "200",
                            "Employees" => $data]);
      } else {

            return $response
                        ->withHeader('Content-Type','application/json')
                        ->withJson([
                                    "status" => "false",
                                    "status_code" => "404",
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
          return $response
                     ->withHeader('Content-Type', 'application/json')
                     ->withJson([
                         "status" => "true",
                         "status_code" => "200",
                         "Employee" => $data ]);
      }else{

          return $response
                     ->withHeader('Content-Type','application/json')
                     ->withJson([
                        "status" => "false",
                        "status_code" => "404",
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
        
        // employee login ...
        $username = $request->getParam('username');
        $password = $request->getParam('password');

        $hashPassword = hashPassword($password);

        // employee permission ..
        $customer = $request->getParam('ep_customer');
        $items = $request->getParam('ep_items');
        $items_store = $request->getParam('ep_items_store');
        $supplier = $request->getParam('ep_supplier');
        $reports = $request->getParam('ep_reports');
        $reports_categories = $request->getParam('ep_reports_categories');
        $reports_customer = $request->getParam('ep_reports_customer');
        $reports_discount = $request->getParam('ep_reports_discount');
        $reports_employee = $request->getParam('ep_reports_employee');
        $reports_inventory = $request->getParam('ep_reports_inventory');
        $reports_items = $request->getParam('ep_reports_items');
        $reports_payments = $request->getParam('ep_reports_payments');
        $reports_recivings = $request->getParam('ep_reports_reciving');
        $reports_sale = $request->getParam('ep_reports_sale');
        $reports_supplier = $request->getParam('ep_reports_supplier');
        $reports_taxes = $request->getParam('ep_reports_taxes');
        $recivings = $request->getParam('ep_recivings');
        $reciving_store = $request->getParam('ep_reciving_store');
        $sales = $request->getParam('ep_sales');
        $sales_store = $request->getParam('ep_sales_store');
        $employee = $request->getParam('ep_employee');
        $gift_cards = $request->getParam('ep_gift_cards');
        $messages = $request->getParam('ep_message');
        $store_config = $request->getParam('ep_store_config');


        // create a new instance of slim\pdo by calling the pdo ...
        $db = pdo();

        // insert into customer table
        $insertStatment = $db->insert(array(
          'first_name',
          'last_name',
          'gender',
          'email',
          'phone_number',
          'address_one',
          'address_two',
          'city',
          'state',
          'zip',
          'country',
          'comments',
          'username',
          'password',
          'ep_customer',
          'ep_items',
          'ep_items_store',
          'ep_supplier',
          'ep_reports',
          'ep_reports_categories',
          'ep_reports_customer',
          'ep_reports_discount',
          'ep_reports_employee',
          'ep_reports_inventory',
          'ep_reports_items',
          'ep_reports_payments',
          'ep_reports_reciving',
          'ep_reports_sale',
          'ep_reports_supplier',
          'ep_reports_taxes',
          'ep_recivings',
          'ep_reciving_store',
          'ep_sales',
          'ep_sales_store',
          'ep_employee',
          'ep_gift_cards',
          'ep_message',
          'ep_store_config'
        ))
        ->into('employee')
        ->values(array(
          $first_name , 
          $last_name , 
          $gender , 
          $email ,
          $phone_number ,
          $address_one ,
          $address_two ,
          $city,
          $state , 
          $zip , 
          $country , 
          $comments,
          $username,
          $hashPassword,
          $customer,
          $items,
          $items_store,
          $supplier,
          $reports,
          $reports_categories,
          $reports_customer,
          $reports_discount,
          $reports_employee,
          $reports_inventory,
          $reports_items,
          $reports_payments,
          $reports_recivings,
          $reports_sale,
          $reports_supplier,
          $reports_taxes,
          $recivings,
          $reciving_store,
          $sales,
          $sales_store,
          $employee,
          $gift_cards,
          $messages,
          $store_config
        ));

        $insertStatment->execute();

        if($insertStatment->execute()){
            return $response
                        ->withHeader('Content-Type' , 'application/json')
                        ->withJson([
                            'status' => 'true',
                            'status_code' => '201',
                            'message' => ' New Employee created successfully .']);
        }else{
            return $response
                       ->withHeader('Content-Type' , 'application/json')
                       ->withJson([
                           'status' => 'false',
                           'status_code' => '500',
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

            return $response
                       ->withHeader('Content-Type','application/json')
                       ->withJson([
                            "status" => "false",
                            "status_code" => "404",
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

        
        // employee login ...
        $username = 
                $request->getParam('username')?? $data['username'];
        $password = $request->getParam('password')?? $data['password'];

        $hashPassword = hashPassword($password);

        // employee permission ..
        $customer =
                 $request->getParam('ep_customer')?? $data['ep_customer'];
        $items = 
                $request->getParam('ep_items')?? $data['ep_items'];
        $items_stock = 
                $request->getParam('ep_items_stock')?? $data['ep_items_stock'];
        $supplier =
                 $request->getParam('ep_supplier')?? $data['ep_supplier'];
        $reports = 
                $request->getParam('ep_reports')?? $data['reports'];
        $reports_categories = 
                $request->getParam('ep_reports_categories')?? $data['ep_reports_categories'];
        $reports_customer = 
                $request->getParam('ep_reports_customer')?? $data['ep_reports_customer'];
        $reports_discount = 
                $request->getParam('ep_reports_discount')?? $data['ep_reports_discount'];
        $reports_employee = 
                $request->getParam('ep_reports_employee')?? $data['ep_reports_employee'];
        $reports_inventory = 
                $request->getParam('reports_inventory')?? $data['ep_reports_inventory'];
        $reports_items = 
                $request->getParam('ep_reports_items')?? $data['ep_reports_items'];
        $reports_payments = 
                $request->getParam('ep_reports_payments')?? $data['ep_reports_payments'];
        $reports_recivings = 
                $request->getParam('ep_reports_recivings')?? $data['ep_reports_recivings'];
        $reports_sales = 
                $request->getParam('ep_reports_sales')?? $data['ep_reports_sales'];
        $reports_suppiler = 
                $request->getParam('ep_reports_suppiler')?? $data['ep_reports_suppiler'];
        $reports_taxes = 
                $request->getParam('ep_reports_taxes')?? $data['ep_reports_taxes'];
        $recivings = 
                $request->getParam('ep_recivings')?? $data['ep_recivings'];
        $recivings_stock = 
                $request->getParam('ep_recivings_store')?? $data['ep_recivings_store'];
        $sales = 
                $request->getParam('ep_sales')?? $data['ep_sales'];
        $sales_stock = 
                $request->getParam('ep_sales_store')?? $data['ep_sales_store'];
        $employee = 
                $request->getParam('ep_employee')?? $data['ep_employee'];
        $gift_cards = 
                $request->getParam('ep_gift_cards')?? $data['ep_gift_cards'];
        $messages = 
                $request->getParam('ep_message')?? $data['ep_message'];
        $store_config = 
                $request->getParam('ep_store_config')?? $data['ep_store_config'];



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
                       'ep_customer'=>$customer,
                       'ep_items'=>$items,
                       'ep_items_store'=>$items_store,
                       'ep_supplier'=>$supplier,
                       'ep_reports'=>$reports,
                       'ep_reports_categories'=>$reports_categories,
                       'ep_reports_customer'=>$reports_customer,
                       'ep_reports_discount'=>$reports_discount,
                       'ep_reports_employee'=>$reports_employee,
                       'ep_reports_inventory'=>$reports_inventory,
                       'ep_reports_items'=>$reports_items,
                       'ep_reports_payments'=>$reports_payments,
                       'ep_reports_reciving'=>$reports_recivings,
                       'ep_reports_sale'=>$reports_sale,
                       'ep_reports_supplier'=>$reports_suppiler,
                       'ep_reports_taxes'=>$reports_taxes,
                       'ep_recivings'=>$recivings,
                       'ep_reciving_store'=>$recivings_store,
                       'ep_sales'=>$sales,
                       'ep_sales_store'=>$salse_store,
                       'ep_employee'=>$employee,
                       'ep_gift_cards'=>$gift_cards,
                       'ep_message'=>$message,
                       'ep_store_config'=>$store_config,
                       'updated_at' => $updated_at
                       ))
                       ->table('employee')
                       ->where('employee_id', '=', $employee_id);

         $updateStatement->execute();

         $db = null;

         return $response
                    ->withHeader('Content-Type' , 'application/json')
                    ->withJson([
                          'status' => 'true',
                          'status_code' => '200',
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

                    return $response
                                ->withHeader('Content-Type','application/json')
                                ->withJson([
                                    "status" =>"false",
                                    "status_code" => "404",
                                    "message" => "No valid user found"]);
                };

                $deleteCustomer = $db->delete()
                                        ->from('employee')
                                        ->where('employee_id', '=', $employee_id);

                $delete = $deleteCustomer->execute();
                $db = null;

                return $response
                            ->withHeader('Content-Type' , 'application/json')
                            ->withJson([
                                'status'=>'true',
                                'status_code' => '204',
                                'message' => ' employee deleted successfully .']);

        }// /md: delete the customer ...


    } // /ctrl:Customer
