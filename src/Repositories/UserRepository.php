<?php

namespace App\Repositories;

use App\Models\UserModel;

class UserRepository {
  private $model = null;

  function __construct()
  {
    $this->model = new UserModel();
  }

  function create(String $user, String $pass)
  {
    return $this->model->createUser($user, $pass);
  }
}
