<?php
/**
 * Created by PhpStorm.
 * User: Boke
 * Date: 2018/4/26
 * Time: 22:00
 */

namespace app\api\service;


use app\lib\enum\ScopeEnum;
use app\lib\exception\ForbiddenException;
use app\lib\exception\TokenException;
use think\Cache;
use think\Request;

class Token
{
    public static function getCurrentUserID(){
        return self::getCurrentTokenVar("user_id");
    }
    public static function getCurrentTokenVar($key){
        $token = Request::instance()->header("token");
        $var = Cache::get($token);
        if(!$var){
            throw new TokenException();
        }else{
            if(!is_array($var)){
                $var = json_decode($var,true);
                //json_decode("",true);->把json格式数据转化为数组
                //json_encode()->把变量转化为json格式
            }
            if(array_key_exists($key,$var)){
                return $var[$key];
            }else{
                throw new \Exception("尝试获取token变量不存在");
            }
        }
    }
    public static function needPrimaryScope(){
        $scope = self::getCurrentTokenVar("scope");
        if($scope){
            if($scope == ScopeEnum::USER){
                return true;
            }else{
                throw new ForbiddenException();
            }
        }else{
            throw new TokenException();
        }
    }
    public static function needExclusiveScope(){
        $scope = self::getCurrentTokenVar("scope");
        if($scope){
            if($scope >= ScopeEnum::USER){
                return true;
            }else{
                throw new ForbiddenException();
            }
        }else{
            throw new TokenException();
        }
    }
}