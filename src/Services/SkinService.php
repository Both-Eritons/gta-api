<?php

namespace App\Services;

class SkinService {

  function getImageById(int $id = 0)
  {
      return  "http://".$_SERVER["HTTP_HOST"]."/public/images/skins/$id.png";
  }
}

