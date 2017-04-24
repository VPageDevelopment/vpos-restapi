<?php

  namespace App\Models;
  use \Illuminate\Database\Eloquent\Model ;


  class Customer extends Model {


    protected $fillable = [
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
      'company',
      'account',
      'total',
      'discount',
      'taxable',

    ];

  }
