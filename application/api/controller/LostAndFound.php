<?php
/**
 * Created by PhpStorm.
 * User: Boke
* Date: 2018/4/27
* Time: 0:08
*/

namespace app\api\controller;


use app\api\model\LostProperty;

class LostAndFound
{
  public function getAll(){
      $allResult = LostProperty::all();
      return $allResult;
  }
}