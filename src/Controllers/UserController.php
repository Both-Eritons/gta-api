<?php

namespace App\Controllers;

use App\Repositories\UserRepository;

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

    $user = $data->username;
    $pass = $data->password;

    $userValidation = isset($user) && !empty($user);
    $passValidation = isset($pass) && !empty($pass);

    if($userValidation && $passValidation) {

      $this->repo->create($user, $pass);

    } else {
      
      http_response_code(401);
      echo json_encode(array("error" => "esta faltando alguma informacao!"));
      die();
    }
  }
}
