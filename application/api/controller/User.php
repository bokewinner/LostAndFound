<?php
/**
 * Created by PhpStorm.
 * User: Boke
 * Date: 2018/4/27
 * Time: 21:27
 */

namespace app\api\controller;


use app\api\model\LostProperty;
use app\api\service\Token;
use app\api\validate\CheckParameter;
use app\api\validate\CreateCheck;
use app\lib\exception\ParameterException;
use app\lib\exception\SuccessMessage;

class User extends BaseController
{
    protected $beforeActionList = [
        'checkExclusiveScope' => ['only' => 'create,update,delete'],
    ];
    public function create(){
        $validate = new CreateCheck();
        $validate->gocheck();
        $userID = Token::getCurrentUserID();//从令牌中获取user_id
        $dataArray = $validate->getDataByRule(input("post."));//过滤post传递的非法参数
        $dataArray["user_id"] = $userID;
        /*$userID = $this->prepareValue();
        /*$user = new LostProperty();
        $user->save($dataArray);*/
        LostProperty::create($dataArray);
        return json(new SuccessMessage(),201);
    }
    public function update($id){
        $validate = new CreateCheck();
        $validate->gocheck();
        $userID = Token::getCurrentUserID();//获取user_id
        $result = LostProperty::where("Id","=",$id)->where("user_id","=",$userID)->find();
        if(!$result){
            throw new ParameterException();
        }
        //获取post传递的数据
        $dataArray = $validate->getDataByRule(input("post."));
        //$dataArray["Id"] = $id;
        //$dataArray["user_id"] = $userID;
        $result->save($dataArray);
        //LostProperty::save($dataArray);
        return json(new SuccessMessage(),201);
    }
    public function deleteData($id){
        (new CheckParameter())->gocheck();
        $userID = Token::getCurrentUserID();
        $result = LostProperty::where("Id","=",$id)->where("user_id","=",$userID)->delete();
        if(!$result){
            throw new ParameterException();
        }
        return json(new SuccessMessage(),201);
    }
    public function getAllByID(){
        $userID = Token::getCurrentUserID();
        $getAllMessage = LostProperty::getAllByID($userID);
        return $getAllMessage;
    }
}