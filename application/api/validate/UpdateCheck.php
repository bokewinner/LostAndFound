<?php
/**
 * Created by PhpStorm.
 * User: Boke
 * Date: 2018/4/28
 * Time: 22:06
 */

namespace app\api\validate;


class UpdateCheck extends BaseValidate
{
    protected $rule = [
        "id" => "require|isNotEmpty",
        "size" => "require|isNotEmpty",
        "location" => "require|isNotEmpty",
        "phone" => "require|isMobile",
        "description" => "require",
        "status" => "require|isNotEmpty"
    ];
}