<?php

  namespace App\Controllers;

  use \Psr\Http\Message\{
      ServerRequestInterface as Request ,
      ResponseInterface as Response };

  class EmployeePermissionController
  {
    //  show all customer ...
    public function showEmployeesPermission( Request $request , Response $response)
    {
        // calling the pdo function to create a new instance of pdo ...
        $db = pdo();
        $selectEmployees = $db->select()->from('employee_permissions');
        $stmt = $selectEmployees->execute();
        $data = $stmt->fetchAll();
        $db = null;

        if($data != null){
            return $response
                       ->withHeader('Content-Type' , 'application/json')
                       ->withJson([
                           "status" => "true",
                           "status_code" => "200",
                           "Employees Permissions" => $data]);
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
    public function showEmployeePermission($request , $response , $arg){

      $employee_fk = $arg['id'];
      $db = pdo();
      // select that particular users
      $selectStatement = $db->select()->from('employee_permissions')
                                      ->where('employee_fk' , '=' , $employee_fk);
      $stmt = $selectStatement->execute();
      $data = $stmt->fetch();
      $db = null;

      if($data != null){
          return $response
                     ->withHeader('Content-Type', 'application/json')
                     ->withJson([
                         "status" => "true",
                         "status_code" => "200",
                         "Employee Permission " => $data ]);
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
    public function addEmployeePermission(Request $request , Response $response){

        $employee_fk = $request->getParam('employee_fk');
        $customer = $request->getParam('customer');
        $items = $request->getParam('items');
        $items_stock = $request->getParam('items_stock');
        $supplier = $request->getParam('supplier');
        $reports = $request->getParam('reports');
        $reports_categories = $request->getParam('reports_categories');
        $reports_customer = $request->getParam('reports_customer');
        $reports_discount = $request->getParam('reports_discount');
        $reports_employee = $request->getParam('reports_employee');
        $reports_inventory = $request->getParam('reports_inventory');
        $reports_items = $request->getParam('reports_items');
        $reports_payments = $request->getParam('reports_payments');
        $reports_recivings = $request->getParam('reports_recivings');
        $reports_sales = $request->getParam('reports_sales');
        $reports_suppiler = $request->getParam('reports_suppiler');
        $reports_taxes = $request->getParam('reports_taxes');
        $recivings = $request->getParam('recivings');
        $recivings_stock = $request->getParam('recivings_stock');
        $sales = $request->getParam('sales');
        $sales_stock = $request->getParam('sales_stock');
        $employee = $request->getParam('employee');
        $gift_cards = $request->getParam('gift_cards');
        $messages = $request->getParam('messages');
        $store_config = $request->getParam('store_config');



        // create a new instance of slim\pdo by calling the pdo ...
        $db = pdo();
        // to the check the credentials is already is created ....
        $selectStatament = $db->select()
                                    ->from('employee_permissions')
                                    ->where('employee_fk' , '=' , $employee_fk);
        $stmt = $selectStatament->execute();
        $isPermisssionExist = $stmt->fetch();

        // to check the employee already has the crendentials ....

        if($isPermisssionExist != null){
            return $response
                       ->withHeader('Content-Type' , 'application/json')
                       ->withJson([
                             'status' => 'false',
                             'status_code' => '300',
                             'message' => ' The Permission  for this employee is already exist.']);
        }


        // insert into customer table
        $insertStatment = $db->insert(array(
          'employee_fk','customer','items' , 'items_stock' , 'supplier' ,
          'reports' , 'reports_categories' , 'reports_customer','reports_discount',
          'reports_employee','reports_inventory' , 'reports_items' , 'reports_payments' ,
          'reports_recivings' , 'reports_sales' , 'reports_suppiler' , 'reports_taxes',
          'recivings' , 'recivings_stock' , 'sales' , 'sales_stock', 'employee',
          'gift_cards' , 'messages' , 'store_config'
        ))
        ->into('employee_permissions')
        ->values(array(
          $employee_fk , $customer , $items , $items_stock , $supplier ,
          $reports , $reports_categories , $reports_customer, $reports_discount,
          $reports_employee ,$reports_inventory , $reports_items , $reports_payments ,
          $reports_recivings, $reports_sales , $reports_suppiler , $reports_taxes ,
          $recivings , $recivings_stock , $sales , $sales_stock, $employee,
          $gift_cards, $messages , $store_config


        ));

        $insertStatment->execute();

        if($insertStatment->execute()){
            return $response
                       ->withHeader('Content-Type' , 'application/json')
                       ->withJson([
                           'status' => 'true',
                           'status_code' => '201',
                           'message' => ' New employee permissions is created successfully .']);
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

    public function updateEmployeePermission (Request $request , Response $response , $arg) {

       $employee_fk = $arg['id'];

       $db = pdo();

       // select that particular users
       $selectStatement = $db->select()
                                  ->from('employee_permissions')
                                  ->where('employee_fk' , '=' ,$employee_fk);
        $stmt = $selectStatement
                      ->execute();

        $db = null;

        $data = $stmt
                    ->fetchAll();

        // check the is already exist or not ...$_COOKIE
        if( $data == null ){

            return $response
                       ->withHeader('Content-Type','application/json')
                       ->withJson([
                            "status" => "false",
                            "status_code" => "404",
                            "message" => "No valid employee found"]);
         };


         $customer =
                    $request->getParam('customer') ?? $data['customer'];
         $items =
                    $request->getParam('items') ?? $data['items'];
         $items_stock =
                    $request->getParam('items_stock') ?? $data['items_stock'];
         $supplier =
                    $request->getParam('supplier') ?? $data['supplier'];
         $reports =
                    $request->getParam('reports') ?? $data['reports'];
         $reports_categories =
                    $request->getParam('reports_categories') ?? $data['reports_categories'];
         $reports_customer =
                    $request->getParam('reports_customer') ?? $data['reports_customer'];
         $reports_discount =
                    $request->getParam('reports_discount') ?? $data['reports_discount'];
         $reports_employee =
                    $request->getParam('reports_employee') ?? $data['reports_employee'];
         $reports_inventory =
                    $request->getParam('reports_inventory') ?? $data['reports_inventory'];
         $reports_items =
                    $request->getParam('reports_items') ?? $data['reports_items'];
         $reports_payments =
                    $request->getParam('reports_payments') ?? $data['reports_payments'];
         $reports_recivings =
                    $request->getParam('reports_recivings') ?? $data['reports_recivings'];
         $reports_sales =
                    $request->getParam('reports_sales') ?? $data['reports_sales'];
         $reports_suppiler =
                    $request->getParam('reports_suppiler') ?? $data['reports_suppiler'];
         $reports_taxes =
                    $request->getParam('reports_taxes') ?? $data['reports_taxes'];
         $recivings =
                    $request->getParam('recivings') ?? $data['recivings'];
         $recivings_stock =
                    $request->getParam('recivings_stock') ?? $data['recivings_stock'];
         $sales =
                    $request->getParam('sales') ?? $data['sales'];
         $sales_stock =
                    $request->getParam('sales_stock') ?? $data['sales_stock'];
         $employee =
                    $request->getParam('employee') ?? $data['employee'];
         $gift_cards =
                    $request->getParam('gift_cards') ?? $data['gift_cards'];
         $messages =
                    $request->getParam('messages') ?? $data['messages'];
         $store_config =
                    $request->getParam('store_config') ?? $data['store_config'];
         $updated_at = getUpdateTime();


        $db = pdo();

        // update the customer ...
        $updateStatement = $db->update(array(
                       'employee_fk' => $employee_fk,
                       'customer'  => $customer,
                       'items' => $items,
                       'items_stock' => $items_stock,
                       'supplier' => $supplier,
                       'reports' => $reports,
                       'reports_categories' => $reports_categories,
                       'reports_customer' => $reports_customer,
                       'reports_discount' => $reports_discount,
                       'reports_employee' => $reports_employee,
                       'reports_inventory' => $reports_inventory,
                       'reports_items' => $reports_items,
                       'reports_payments' => $reports_payments,
                       'reports_recivings' => $reports_recivings,
                       'reports_sales' => $reports_sales,
                       'reports_suppiler' => $reports_suppiler,
                       'reports_taxes' => $reports_taxes,
                       'recivings' => $recivings,
                       'recivings_stock' => $recivings_stock,
                       'sales' => $sales,
                       'sales_stock' => $sales_stock,
                       'employee' => $employee,
                       'gift_cards' => $gift_cards,
                       'messages' => $messages,
                       'store_config' => $store_config,
                       'updated_at' => $updated_at
                       ))
                       ->table('employee_permissions')
                       ->where('employee_fk' , '=' ,$employee_fk);

         $updateStatement->execute();

        $db = null;

        return $response
                    ->withHeader('Content-Type' , 'application/json')
                    ->withJson([
                          'status' => 'true',
                          'status_code' => '200',
                          'message' => ' updated records successfully .'
                        ]);



    } // /md: updateCustomer

    // delete customer ...
    public function deleteEmployeePermission(Request $request , Response $response , $arg){

                $employee_fk = $arg['id'];

                $db = pdo();

                // select that particular users
                $selectStatement = $db->select()
                                        ->from('employee_permissions')
                                        ->where('employee_fk' , '=' ,$employee_fk);
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
                                    "status_code" => "404",
                                    "message" => "No valid records found"]);
                };

                $deleteCustomer = $db->delete()
                                        ->from('employee_permissions')
                                        ->where('employee_fk', '=', $employee_fk);

                $delete = $deleteCustomer->execute();
                $db = null;

                return $response
                           ->withHeader('Content-Type' , 'application/json')
                           ->withJson([
                                'status' => 'true',
                                'status_code' => '204',
                                'message' => ' employee deleted successfully .']);

        }// /md: delete the customer ...


  } // /ctrl:Customer
