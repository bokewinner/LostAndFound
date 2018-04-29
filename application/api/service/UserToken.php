<?php
/**
 * Created by PhpStorm.
 * User: Boke
 * Date: 2018/4/24
 * Time: 22:32
 */

namespace app\api\service;


use app\lib\enum\ScopeEnum;
use app\lib\exception\TokenException;

class UserToken extends Token
{
    public  function grantToken($userID){
        $cacheValue = $this->prepareCacheValue($userID);
        //$token = $this->prepareCacheValue($cacheValue);
        return $this->saveToCache($cacheValue);
    }
    private function prepareCacheValue($userID){
        $cacheValue = array();
        $cacheValue["user_id"] = $userID;
        $cacheValue["scope"] = ScopeEnum::USER;//权限控制
        return $cacheValue;
    }
    private function saveToCache($cacheValue){
        $key = self::generateToken();
        $value = json_encode($cacheValue);
        $expire_in = config("setting.token_expire_in");
        $request = cache($key,$value,$expire_in);
        if(!$request){
            throw new TokenException([
                "msg" =>"服务器缓存异常",
                "errorCode" => 10005
            ]);
        }
        return $key;
    }
    protected static function generateToken(){
        //32个字符组成的一组随机字符串
        $randChars = getRandChars(32);
        //用三组字符串进行md5加密
        $timestamp = $_SERVER['REQUEST_TIME_FLOAT'];
        //salt 加盐
        $salt = config("secure.token_salt");
        return md5($randChars.$timestamp.$salt);
    }
}