<?php

namespace App\Controllers;

use App\Repositories\UserRepository;
use App\Helpers\API\Json;

class UserController {
  private $repo = null;

  function __construct()
  {
    $this->repo = new UserRepository();
  }

  function create()
  { 
    $json = file_get_contents("php://input");
    $data = json_decode($json);

    $userValidation = isset($data->username) && !empty($data->username);
    $passValidation = isset($data->password) && !empty($data->password);
    
    if($userValidation && $passValidation) {

      $this->repo->create($data->username, $data->password);

    } else {
      
      Json::sendJson(400, "esta faltando informacoes.");
      die();

    }
  }
}
