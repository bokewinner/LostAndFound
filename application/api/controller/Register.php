<?php
/**
 * Created by PhpStorm.
 * User: Boke
 * Date: 2018/4/25
 * Time: 23:10
 */

namespace app\api\controller;


use app\api\model\User;
use app\api\validate\RegisterCheck;
use app\lib\exception\LoginFailException;

class Register
{
    /*
     * 功能：检查注册
     * */
    public function checkRegister(){
        (new RegisterCheck())->gocheck();
        $postValue = input("post.");
        $legalChar = $this->getLegalChar($postValue);//把其他非法的参数过滤掉
        $judge = User::judgeIsRepeat($legalChar);
        if(!empty($judge)){
            throw new LoginFailException([
                "msg" => "用户名已存在"
            ]);
        }
        $User = new User();
        $User->save($legalChar);
    }
    /*
     * 功能：过滤非法参数
     * @param array $postValue
     * @return array
     * */
    private function getLegalChar($postValue){
        $newArray = array();
        $newArray["user"] = $postValue["user"];
        $newArray["password"] = $postValue["password"];
        return $newArray;
    }

}