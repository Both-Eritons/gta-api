<?php

namespace App\Models;

use App\Configurations\Database\Connect;
use App\Entity\User;

class UserModel extends Connect {
  private $table;

  function __construct()
  {
    parent::__construct();
    $this->table = "users";
  }

  function createUser(String $user, String $pass)
  {
    if($this->usernameExists($user)) {
      http_response_code(401);
      echo json_encode(array("error" => "este usuario ja existe."));
      die();
    }

    $sql = "INSERT INTO $this->table(username,password) VALUES(:user, :pass);";

    $stmt = $this->connection->prepare($sql);
    $stmt->bindParam(":user", $user);
    $stmt->bindParam(":pass", $pass);
    $stmt->execute();
    $userId = $this->connection->lastInsertId();

    http_response_code(200);
    echo json_encode(array("success" => "usuario criado com sucesso!"));

    return new User($userId, $user, $pass);
  }

  function usernameExists(String $user)
  {
    $sql = "SELECT username FROM $this->table WHERE username = :user";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute(array(":user" => $user));

    return $stmt->rowCount() > 0 ? true : false;
    
  }

}
