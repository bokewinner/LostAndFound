<?php
/**
 * Created by PhpStorm.
 * User: Boke
 * Date: 2018/4/24
 * Time: 21:27
 */

namespace app\lib\exception;


class LoginFailException extends BaseException
{
    public $code = 404;
    public $msg = "用户名或密码不存在";
    public $errorCode = 10001;
}