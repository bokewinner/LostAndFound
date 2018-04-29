<?php
/**
 * Created by PhpStorm.
 * User: Boke
 * Date: 2018/4/27
 * Time: 21:39
 */

namespace app\api\validate;


class CreateCheck extends BaseValidate
{
    protected $rule = [
        "size" => "require|isNotEmpty",
        "location" => "require|isNotEmpty",
        "phone" => "require|isMobile",
        "description" => "require",
        "status" => "require|isNotEmpty"
    ];
}