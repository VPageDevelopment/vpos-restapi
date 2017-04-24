<?php
  namespace App\Controllers;

  use Illuminate\Database\Query\Builder;
  use Psr\Http\Message\ServerRequestInterface as Request;
  use Psr\Http\Message\ResponseInterface as Response;


class Controller {

    protected $table;
    public function __construct (Builder $table){
        $this->table = $table;
    }

  }
