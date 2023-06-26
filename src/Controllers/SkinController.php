<?php

namespace App\Controllers;

use App\Services\SkinService;

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
    echo json_encode($arr, JSON_UNESCAPED_SLASHES);
  }

  function getById($param)
  {
    $id = $param->skin_id;
    $image = $this->service->getImageById($id);
    $arr = array("id" => $id, "url" => $image);
    echo json_encode($arr, JSON_UNESCAPED_SLASHES);
  }
}
