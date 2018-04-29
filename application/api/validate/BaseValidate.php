<?php
namespace app\api\validate;
use app\lib\exception\LoginFailException;
use app\lib\exception\ParameterException;
use think\Request;
use think\Validate;
class BaseValidate extends Validate
{
    public function gocheck(){
        //1.获取http请求参数
        //2.对这些参数进行校验
        $request = Request::instance();
        $params = $request->param();//获取所有http参数请求类型和值
        $result = $this->batch()->check($params);//BaseValidate继承Validate，而this可以指向父类的属性和方法
        if(!$result){
            $e = new ParameterException([
                "msg"=>$this->error
            ]);
            throw $e;
        }else{
            return true;
        }
    }
    protected function isNotEmpty($value,$rule='',$data='',$field=''){
        if(empty($value)){
            return $field."can not be empty yooooo!";
        }
        return true;
    }
    protected function isNotIllegalChar($value,$rule='',$data='',$field=''){
        $illegalChar = array("'",",","*","&","#","%","(",")","=");
        for($i = 0;$i < count($illegalChar);$i++)//获取每一个非法字符
        {
            for($j = 1;$j <= strlen($value);$j++){//获取user中的单个字符
                if($illegalChar[$i] === substr($value,$j)){
                    throw new LoginFailException([
                        "msg" => "非法字符",
                        "errorCode" => 10001
                    ]);
                }
            }
        }
        return true;
    }
    public function getDataByRule($arrays){
        if(array_key_exists('user_id',$arrays)){
            //不允许包含user_id和uid，防止恶意覆盖user_id外键
            throw new ParameterException([
                'msg' => '参数中包含非法的参数名user_id或Id'
            ]);
        }
        $newArray = [];
        foreach ($this->rule as $key => $value){
            $newArray[$key] = $arrays[$key];
        }
        return $newArray;
    }
    protected function isMobile($value)
    {
        $rule = '^1(3|4|5|7|8)[0-9]\d{8}$^';
        $result = preg_match($rule, $value);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}