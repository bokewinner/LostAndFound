<?php
/**
 * Created by PhpStorm.
 * User: Boke
 * Date: 2018/4/25
 * Time: 23:14
 */

namespace app\api\validate;


class RegisterCheck extends BaseValidate
{
    protected $rule = [
        "user" => "require|isNotEmpty|isNotIllegalChar|length:1,10",
        "password" => "require|isNotEmpty"
    ];
}