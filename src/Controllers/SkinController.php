<?php

namespace App\Controllers;

use App\Helpers\API\Json;
use App\Services\SkinService;
use JsonSerializable;

class SkinController {
  private $service = null;

  function __construct()
  {
    $this->service = new SkinService();
  }

  function getAll()
  {
    $page = !empty($_GET["page"]) ? $_GET["page"] : 0;
    $limit = !empty($_GET["limit"]) ? $_GET["limit"] : 300;
    $arr = array("skins" => array());

    for($i = 0; $i <= $limit; $i++) {

      $image = $this->service->getImageById($i);

      $newSkin = ["id" => $i, "url" => $image];

      $arr["skins"][] = $newSkin;
    }
    //echo $limit;
    echo json_encode($arr, JSON_PRETTY_PRINT + JSON_UNESCAPED_SLASHES);
  }

  function getById($param)
  {
    $id = intval($param->skin_id);

    if(!intval($id)) {
      Json::sendJson(401, "a skin precisa ser um numero!");
      die();
    }

    if($id < 0 || $id > 311) {
      Json::sendJson(404, "skin nao encontrada");
      die();
    }

    $image = $this->service->getImageById($id);
    $arr = array("id" => $id, "url" => $image);
    echo json_encode($arr, JSON_PRETTY_PRINT + JSON_UNESCAPED_SLASHES);
  }
}
