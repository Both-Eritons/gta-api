<?php

namespace App\Entity;

class User{

  private Int $id;
  private String $username;
  private String $password;

  function __construct(Int $id, String $user, String $pass)
  {

    $this->id           = $id;
    $this->username     = $user;
    $this->password     = $pass;

  }

  /*        GETTERS        */
  function getId()
  {
    return $this->id;
  }

  function getUsername()
  {
    return $this->username;
  }

  function getPassword()
  {
    return $this->password;
  }

  /*        SETTERS        */
  function setId(Int $id)
  {
    $this->id = $id;
  }

  function setUsername(String $user)
  {
    $this->username = $user;
  }

  function setPassword(String $pass)
  {
    $this->password = $pass;
  }
}
