<?php
/**
 * Created by PhpStorm.
 * User: Boke
 * Date: 2018/4/25
 * Time: 22:42
 */

namespace app\lib\exception;


class TokenException extends BaseException
{
    public $code = 401;
    public $msg = "token已过期或token无效";
    public $errorCode = 10001;
}