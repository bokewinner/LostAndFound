<?php
namespace app\lib\exception;
use think\Exception;
class BaseException extends Exception
{
    //http状态码
    public $code = 400;
    public $msg = "参数错误";
    public $errorCode = 10000;
    public function __construct($param = [])
    {
        if(!is_array($param)){
            return ;
            //throw new Exception("数组不存在");
        }
        if(array_key_exists("code",$param)){
            $this->code = $param["code"];
        }
        if(array_key_exists("msg",$param)){
            $this->msg = $param["msg"];
        }
        if(array_key_exists("errorCode",$param)){
            $this->errorCode = $param["errorCode"];
        }
    }
}