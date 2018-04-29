<?php
/**
 * Created by PhpStorm.
 * User: Boke
 * Date: 2018/4/26
 * Time: 23:48
 */

namespace app\api\model;


class LostProperty extends BaseModel
{
    protected $autoWriteTimestamp = true;
    protected $hidden = ["user_id"];
    public function user(){
        return $this->belongsTo("User","user_id","Id");
    }
    public static function getAllByID($userID){
        $result = self::where("user_id","=",$userID)->select();
        return $result;
    }
   /* public static function getMessageByID($id,$userID){
        $result = self::where("Id","=",$id)->where("user_id","=",$userID)->find();
        return $result;
    }*/
}