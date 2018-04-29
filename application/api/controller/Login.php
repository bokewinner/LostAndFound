<?php
namespace app\api\controller;
use app\api\model\User as UserModel;
use app\api\service\Token;
use app\api\service\UserToken;
use app\api\validate\LoginIsNotEmpty;
use app\lib\exception\LoginFailException;

class Login{
    /*
     * 功能：检查登陆
     * */
    public function checkLogin(){
      // $value = input("post.");
      // return json($value);
        (new LoginIsNotEmpty())->gocheck();
        $value = input("post.");
        $result = UserModel::judgeIsRight($value);
        if(!$result){
            throw new LoginFailException();
        }
        $userID = $result["Id"];

        $tokenGet = new UserToken();
        $token = $tokenGet->grantToken($userID);
        return [
            "token" => $token
        ];
    }
    public function getToken(){
        $result = Token::getCurrentTokenVar("user_id");
        unset($result["scope"]);
        return $result;
    }
}