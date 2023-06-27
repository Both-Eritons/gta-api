<?php

namespace App\Helpers\API;

use DateTime;
use DateTimeZone;

class Json {

  function __construct(){}

  static function sendJson(Int $http = 200, String $message = "")
  {
    $date = new DateTime("now", new DateTimeZone("america/fortaleza"));

    $arr = array(
      "code" => $http,
      "message" => $message,
      "timestamp" => $date->format("d-m-Y H:i:s")
    );

    http_response_code($http);
    echo json_encode($arr, JSON_PRETTY_PRINT+JSON_UNESCAPED_SLASHES);
  }
}
