<?php
/**
 * Created by PhpStorm.
 * User: Boke
 * Date: 2018/4/27
 * Time: 21:11
 */

namespace app\lib\exception;


class ForbiddenException extends BaseException
{
    public $code = 403;
    public $msg = "权限不够";
    public $errorCode = 10001;
}