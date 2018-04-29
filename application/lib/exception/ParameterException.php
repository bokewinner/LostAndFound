<?php
namespace app\lib\exception;
class ParameterException extends BaseException
{
    public $code = 400;
    public $msg = "参数错误";
    public $errorCode = 10000;//通用参数错误
    //子类自动继承基类的构造函数
}