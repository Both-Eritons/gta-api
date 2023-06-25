<?php

namespace App\Configurations\Database;

use Dotenv\Dotenv;
use PDO;
use PDOException;

$dotenv = Dotenv::createImmutable(dirname(__DIR__,3));
$dotenv->load();

class Connect {
  protected $connection;

  function __construct()
  {
    $this->ConnectDatabase();
  }

  function ConnectDatabase()
  {
    try {
      $this->connection = new PDO("mysql:host=".$_ENV["DB_HOST"].";dbname=".$_ENV["DB"],$_ENV["DB_USER"],$_ENV["DB_PASS"], [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
      ]);
      
    } catch(PDOException $e) {
      echo $e;
      die();
    }
  }
}

