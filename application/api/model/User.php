<?php
namespace app\api\model;
class User extends BaseModel {
    protected $hidden = ["password","Id"];
    public static function judgeIsRight($postValue){
        $loginStatus = self::where("password","=",$postValue["password"])
            ->where("user","=",$postValue["user"])->find();
        return $loginStatus;
    }
    public static function judgeIsRepeat($legalChar){
        $result = self::where("user","=",$legalChar["user"])->find();
        return $result;
    }
}