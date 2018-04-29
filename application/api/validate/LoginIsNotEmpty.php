<?php
namespace app\api\validate;
class LoginIsNotEmpty extends BaseValidate{
    protected $rule = [
        "user" => "require|isNotEmpty",
        "password" => "require|isNotEmpty"
    ];
}