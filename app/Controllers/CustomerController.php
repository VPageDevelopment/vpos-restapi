<?php

  namespace App\Controllers;

  use \Psr\Http\Message\
    {
      ServerRequestInterface as Request ,
      ResponseInterface as Response
    };
  use App\Models\Customer;

  class CustomerController extends Controller
  {

    //  show all customer ...
    public function customers( $request , $response)
    {
      $customers = $this->table->get();

      return $response->withHeader('Content-Type' , 'application/json')
                      ->withJson(["customers" => $customers]);
    }

    // show single customer ...
    public function customer($request , $response , $arg){

      $customer = $this->table->where('customer_id', $arg['id'])->get();

      if(! $customer->first()){
            return $response->withHeader('Content-Type','application/json')
                                    ->withJson([
                                        "code" => "404",
                                        "message" => "No valid user found"]);

      }else{
            return $response->withJson(["message" => $customer ]);
      }

    }

    // create new customers

    public function addCustomer(Request $request , Response $response){

         Customer::create([
          'first_name' => $request->getParam('first_name'),
          'last_name' => $request->getParam('last_name'),
          'gender' => $request->getParam('gender'),
          'email' =>  $request->getParam('email'),
          'phone_number' => $request->getParam('phone_number'),
          'address_one' => $request->getParam('address_one'),
          'address_two' => $request->getParam('address_two'),
          'city' => $request->getParam('city'),
          'state' => $request->getParam('state'),
          'zip' => $request->getParam('zip'),
          'country' => $request->getParam('country'),
          'comments' => $request->getParam('comments'),
          'company' => $request->getParam('company'),
          'account' => $request->getParam('account'),
          'total' => $request->getParam('total'),
          'discount' => $request->getParam('discount'),
          'taxable' => $request->getParam('taxable'),
        ]);

        $response->withHeader('Content-Type' , 'application/json')
                 ->withJson(['message' => 'New Customer created successfully ..']);
    }

    //


  }
